<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class OrderPlacementTest extends TestCase
{
    //use RefreshDatabase;

    #[Test]
    public function a_logged_in_customer_can_place_an_order_and_stock_decreases()
    {
        $this->withoutMiddleware(); // DISABLE CSRF

        $product = Product::create([
            'product_name' => 'Test Product A',
            'description'  => 'Product used for testing',
            'price'        => 100,
            'category'     => 'Test',
            'stock'        => 5,
            'image'        => null,
        ]);

        $customer = Customer::create([
            'c_name' => 'Test Customer2',
            'c_email' => 'test2@example.com',
            'c_mobile_no' => '9999999990',
            'password' => bcrypt(12345678), 
        ]);

        $this->actingAs($customer, 'customer')
             ->post(route('customer.orders.store'), [
                 'product_id' => $product->id,
                 'quantity'   => 2,
             ])
             ->assertRedirect(route('customer.orders.index'));

        $this->assertDatabaseHas('orders', [
            'customer_id' => $customer->id,
            'product_id'  => $product->id,
            'quantity'    => 2,
            'total_price' => 200.00,
        ]);

        $product->refresh();
        $this->assertEquals(3, $product->stock);
    }
}
