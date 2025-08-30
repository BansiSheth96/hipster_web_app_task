<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'product_name' => 'Smartphone X',
                'description'  => 'A powerful smartphone with a long-lasting battery and high-resolution camera.',
                'price'        => 70000,
                'image'        => 'storage/app/public/products/smartphone_x.jpg', 
                'stock'        => 50,
                'category'     => 'Electronics',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'product_name' => 'Laptop Pro 15',
                'description'  => 'Designed for professionals, this laptop offers top-tier performance and a sleek design.',
                'price'        => 100000,
                'image'        => 'storage/app/public/products/laptop_pro.jpg',
                'stock'        => 25,
                'category'     => 'Electronics',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'product_name' => 'Running Shoes',
                'description'  => 'Lightweight and durable shoes, perfect for long-distance running.',
                'price'        => 9000,
                'image'        => 'storage/app/public/products/running_shoes.jpg',
                'stock'        => 75,
                'category'     => 'Sports',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
