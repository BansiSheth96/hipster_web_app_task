<?php

namespace Tests\Unit;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCreationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function product_can_be_created_and_saved_in_database()
    {
        $data = [
            'product_name' => 'Unit Test Product',
            'description'  => 'This product was created in a unit test',
            'price'        => 49,
            'category'     => 'UnitTest',
            'stock'        => 10,
            'image'        => null,
        ];

        $product = Product::create($data);

        $this->assertNotNull($product->id);
        $this->assertDatabaseHas('products', [
            'product_name' => 'Unit Test Product',
            'price' => 49,
            'stock' => 10,
        ]);
    }
}
