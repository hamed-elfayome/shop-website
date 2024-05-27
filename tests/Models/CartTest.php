<?php

namespace Tests\Models;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Money\Currency;
use Money\Money;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;


    #[Test] public function it_can_create_a_cart()
    {
        $cart = new Cart();
        $cart->user_id = 1;
        $cart->save();
        $this->assertEquals(1, $cart->user_id);
    }

    #[Test] public function user_has_only_one_cart()
    {
        $user = User::factory()->create();
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();
        $userCart = $user->cart;

        // Try to create a second cart with the same user ID
        $duplicateCart = new Cart();
        $duplicateCart->user_id = $user->id;

        // Assert that trying to save the duplicate cart throws a ModelNotFoundException
        $this->expectException(QueryException::class);
        $duplicateCart->save();

        $this->assertEquals($cart->id, $userCart->id);
    }

    #[Test] public function cart_has_many_items()
    {
        $cart = Cart::factory()->create(['user_id' => 1]);

        CartItems::factory(5)->create(['cart_id' => $cart->id, 'product_variant_id' => 1, 'quantity' => 10]);

        $this->assertCount(5, $cart->items);
    }

    #[Test] public function it_can_calculate_the_total_price()
    {
        $cart = Cart::factory()->create(['user_id' => 1]);

        $product_1 = Product::factory()->create(['price' => 20000]);

        $productVariant_1 = ProductVariant::factory()->create(['product_id' => $product_1->id]);

        CartItems::factory()->create(['cart_id' => $cart->id, 'product_variant_id' => $productVariant_1->id, 'quantity' => 8]);

        $product_2 = Product::factory()->create(['price' => 15000]);

        $productVariant_2 = ProductVariant::factory()->create(['product_id' => $product_2->id]);

        CartItems::factory()->create(['cart_id' => $cart->id, 'product_variant_id' => $productVariant_2->id, 'quantity' => 3]);

        $expectedTotal = (new Money(205000, new Currency('EGP')));

        $this->assertEquals($expectedTotal, $cart->total);
    }

}
