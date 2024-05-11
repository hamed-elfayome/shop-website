<?php

namespace App\Actions\Shopapp;

use App\Livewire\Product;
use App\Models\Cart;

class MigrateSessionCart
{
    public function migrate(Cart $sessionCart, Cart $userCart)
    {
        $sessionCart->items->each(fn($item) => product::add(
           variantId: $item->product_variant_id,
           quantity: $item->quantity,
           cart: $userCart,
        ));

        $sessionCart->items()->delete();
        $sessionCart->delete();
    }
}
