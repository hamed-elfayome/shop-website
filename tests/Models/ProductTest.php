<?php

namespace Tests\Models;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Money\Currency;
use Money\Money;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;


    #[Test] public function it_can_create_a_product()
    {
        $product = new Product();
        $product->name = 'Test Product';
        $product->description = 'test description';
        $product->price = 2000;
        $product->save();
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'description' => 'test description',
            'price' => 2000,
        ]);
    }


    #[Test] public function it_format_product_price_correctly()
    {
        $product =Product::factory()->create(['price' => 50000]);

        $expectedPrice = (new Money(50000, new Currency('EGP')));

        $this->assertEquals($expectedPrice, $product->price);
    }

    #[Test] public function product_haa_many_variants()
    {
        $product =Product::factory()->create();

        ProductVariant::factory(3)->create(['product_id' => $product->id]);

        $this->assertCount(3, $product->variants);

    }

}
