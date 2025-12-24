<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        for ($i = 1; $i <= 50; $i++) { // Change 50 to any number you want
            Category::create([
                'name' => 'Category '.$i,
                'description' => 'This is a sample description for Category '.$i,
            ]);
        }

        for ($i = 1; $i <= 50; $i++) { // Change 50 to any number you want
            Product::create([
                'name' => 'Product '.$i,
                'description' => 'This is a sample description for product '.$i,
                'category_id' => $i,
                'imagepath' => 'assets/img/products/product-img-'.$i.'.jpg',
                'price' => rand(50, 500), // Random price
            ]);
        }
    }
}
