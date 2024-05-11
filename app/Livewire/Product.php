<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use App\Models\Cart;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;
    public $productId;

    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id'],
    ];

    public function mount()
    {
        $this->variant = $this->product->variants()->value('id');
    }

    public static function add($variantId, $quantity = 1, $cart = null)
    {
        ($cart ?: CartFactory::getOrMake())->items()->firstOrCreate([
            'product_variant_id' => $variantId,
        ], [
            'quantity' => 0,
        ])->increment('quantity', $quantity);
    }

    public function addToCart()
    {
        $this->validate();

        $this->add($this->variant);

        $this->banner("the product has been added to the cart");

        $this->emit('CartUpdated');
    }

    public function getProductProperty()
    {
        return \App\Models\Product::findOrFail($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
