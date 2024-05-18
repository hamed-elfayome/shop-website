<?php

namespace App\Livewire;

use App\Actions\Shopapp\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Livewire\Component;

class Cart extends Component
{
    public $listeners = [
        'CartUpdated' => '$refresh',
    ];

    public $address;

    public function mount()
    {
        $user = auth()->user();
        if($user)
        {
            $this->address = auth()->user()->userAddress()->value('id');
        }
    }
    public function checkout(CreateStripeCheckoutSession $checkoutSession)
    {
        return $checkoutSession->createFromCart($this->cart, $this->address);
    }

    public function getCartProperty()
    {
        return CartFactory::getOrMake()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    public function getItemsProperty()
    {
        return $this->cart->items;
    }

    public function getAddressesProperty()
    {
        return $this->cart->user->userAddress;
    }

    public function delete($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();

        $this->emit("CartUpdated");
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items()->where('id', $itemId)->first();

        if($item->quantity > 1) {
            $item->decrement('quantity');
        }


        $this->emit("CartUpdated");
    }
    public function increment($itemId)
    {
        $this->cart->items()->where('id', $itemId)->increment('quantity');

        $this->emit("CartUpdated");
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
