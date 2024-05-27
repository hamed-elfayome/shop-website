<?php

namespace Tests\Models;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Money\Currency;
use Money\Money;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CartItemsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]public function it_can_creat_cart_item()
    {
        $cartItem = new CartItems();
        $cartItem->cart_id = 1;
        $cartItem->product_variant_id = 1;
        $cartItem->quantity = 5;
        $cartItem->save();
        $this->assertDatabaseHas('cart_items', ['cart_id' => 1, 'product_variant_id' => 1, 'quantity' => 5]);
    }

    #[Test] public function cart_item_belongs_to_a_variant()
    {
        $productVariant = ProductVariant::factory()->create(['product_id' => 1]);

        $cartItem = CartItems::factory()->create(['cart_id' => 1, 'product_variant_id' => $productVariant->id, 'quantity' => 10]);

        $this->assertTrue($cartItem->variant()->exists());
        $this->assertEquals($productVariant->id, $cartItem->variant->id);

    }

    #[Test] public function cart_item_has_one_product_through_a_variant()
    {
        $product = Product::factory()->create();

        $productVariant = ProductVariant::factory()->create(['product_id' => $product->id]);

        $cartItem = CartItems::factory()->create(['cart_id' => 1, 'product_variant_id' => $productVariant->id, 'quantity' => 2]);

        $this->assertEquals($product->id, $cartItem->product->id);
    }

    #[Test] public function it_can_calculate_the_sub_total()
    {
        $product = Product::factory()->create(['price' => 20000]);

        $productVariant = ProductVariant::factory()->create(['product_id' => $product->id]);

        $cartItem = CartItems::factory()->create(['cart_id' => 1, 'product_variant_id' => $productVariant->id, 'quantity' => 8]);

        $expectedSubTotal = (new Money(160000, new Currency('EGP')));

        $this->assertEquals($expectedSubTotal, $cartItem->subtotal);
    }


}
