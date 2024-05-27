<?php

namespace Tests\Models;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProductVariantTest extends TestCase
{
    use RefreshDatabase;

    #[Test] public function it_can_create_a_product_variant()
    {
        $product =Product::factory()->create();

        $productVariant = new ProductVariant();
        $productVariant->product_id = 1;
        $productVariant->color = "red";
        $productVariant->size = "S";
        $productVariant->save();

        $this->assertDatabaseHas('product_variants', [
            'product_id' => 1,
            'color' => 'red',
            'size' => 'S',
        ]);
    }

    #[Test] public function product_variant_belongs_to_a_product()
    {
        $product =Product::factory()->create();

        $productVariant =ProductVariant::factory()->create(['product_id' => $product->id]);

        $this->assertTrue($product->variants()->exists());
        $this->assertEquals($product->id, $productVariant->product->id);

    }

}
