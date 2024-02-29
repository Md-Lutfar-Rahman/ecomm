<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Sample product data
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'Description of product 1',
                'price' => 10.00,
                'quantity' => 100,
                'image' => 'path/to/image1.jpg',
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description of product 2',
                'price' => 20.00,
                'quantity' => 50,
                'image' => 'path/to/image2.jpg',
            ],
            [
                'name' => 'Product 3',
                'description' => 'Description of product 3',
                'price' => 15.00,
                'quantity' => 75,
                'image' => 'path/to/image3.jpg',
            ],
            [
                'name' => 'Product 4',
                'description' => 'Description of product 4',
                'price' => 25.00,
                'quantity' => 60,
                'image' => 'path/to/image4.jpg',
            ],
            [
                'name' => 'Product 5',
                'description' => 'Description of product 5',
                'price' => 30.00,
                'quantity' => 90,
                'image' => 'path/to/image5.jpg',
            ],
            [
                'name' => 'Product 6',
                'description' => 'Description of product 6',
                'price' => 18.00,
                'quantity' => 120,
                'image' => 'path/to/image6.jpg',
            ],
            [
                'name' => 'Product 7',
                'description' => 'Description of product 7',
                'price' => 22.00,
                'quantity' => 40,
                'image' => 'path/to/image7.jpg',
            ],

            // Add more products as needed
        ];

        // Seed products
        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
