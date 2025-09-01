<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Wireless Earbuds',
                'description' => 'Enjoy high-quality audio and a seamless listening experience with these sleek, noise-canceling earbuds.',
                'price' => 6000,
                'stock' => 10,
                'category' => 'Electronic',
                'image_url' => 'https://www.lapcare.com/cdn/shop/files/1_2.jpg?v=1755701481&width=3500', 
            ],
            [
                'product_name' => 'Electric Toothbrush',
                'description' => 'This toothbrush has a built-in timer and multiple cleaning modes for a personalized experience',
                'price' => 700,
                'stock' => 20,
                'category' => 'Electronic',
                'image_url' => 'https://ultracarepro.in/cdn/shop/files/6copy.jpg?v=1739182210&width=1214',
            ],
            [
                'product_name' => 'Acrylic Paint Set',
                'description' => 'A vibrant collection of 24 artist-grade acrylic paints. They are quick-drying and suitable for canvas, wood, and ceramic surfaces.',
                'price' => 700,
                'stock' => 20,
                'category' => 'Arts & Crafts',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgxB4sAtqkvjqj4PtNuHwLccTqnIU2bjjowQ&s',
            ],
        ];

        $counter = 1;

        foreach ($products as $data) {
            $imageName = 'products/product_' . $counter . '.jpg';

            $imageContent = file_get_contents($data['image_url']);

            Storage::disk('public')->put($imageName, $imageContent);

            Product::create([
                'product_name' => $data['product_name'],
                'description'  => $data['description'],
                'price'        => $data['price'],
                'stock'        => $data['stock'],
                'category'     => $data['category'],
                'image'        => $imageName, 
            ]);

            $counter++;
        }
    }
}
