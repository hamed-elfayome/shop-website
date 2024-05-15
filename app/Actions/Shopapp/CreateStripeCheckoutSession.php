<?php

namespace App\Actions\Shopapp;



use App\Models\Cart;

class CreateStripeCheckoutSession
{
    public function createFromCart(Cart $cart)
    {
        return $cart->user->checkout(
            $this->setCartItems($cart->items)
        );
    }

    private function setCartItems($items)
    {
        return $items->loadMissing('product', 'variant')->map(fn ($item) =>[
            'price_data' => [
                'currency' => 'EGP',
                'unit_amount' => $item->product->price->getAmount(),
                'product_data' => [
                    'name' => $item->product->name,
                    'description' => "Size: {$item->variant->size} - Color:{$item->variant->color}",
                    'metadata' => [
                        'product_id' => $item->product->id,
                        'product_variant_id' => $item->product_variant_id,
                    ]
                ]
            ],
            'quantity' => $item->quantity,
        ])->toArray();
    }
}