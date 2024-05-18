<?php

namespace App\Actions\Shopapp;

use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Laravel\Cashier\Cashier;

class CheckoutSessionCompleted
{
    public function handle($sessionId)
    {
        DB::transaction(function () use ($sessionId) {
            $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
            $user = User::find($session->metadata->user_id);
            $address = UserAddress::find($session->metadata->address_id);
            $cart = Cart::find($session->metadata->cart_id);

            $order = $user->orders()->create([
                'stripe_checkout_session_id' => $session->id,
                'amount_shipping' => $session->total_details->amount_shipping,
                'amount_discount' => $session->total_details->amount_discount,
                'amount_total' => $session->amount_total,
                'shipping_address' => [
                    'country' => $address->country,
                    'city' => $address->city,
                    'street' => $address->street,
                    'building_num' => $address->building_num,
                    'postal_code' => $address->postal_code,
                    "floor" => $address->floor,
                    "flat_num" => $address->flat_num,
                    "additional_info" => $address->additional_info,
                ]
            ]);

            $lineItems = Cashier::stripe()->checkout->sessions->allLineItems($sessionId);

            $orderItems = collect($lineItems->all())->map(function ($line) {
                $product = Cashier::stripe()->products->retrieve($line->price->product);

                return new OrderItem([
                    'product_variant_id' => $product->metadata->product_variant_id,
                    'price' => $line->price->unit_amount,
                    'quantity' => $line->quantity,
                    'amount_discount' => 0,
                    'amount_total' => $line->price->unit_amount,
                    'name' => $product->name,
                    'description' => $product->description,
                ]);
            });
            $order->items()->saveMany($orderItems);

            $cart->items()->delete();
            $cart->delete();

            Event::dispatch("CartUpdated");
        });

    }
}
