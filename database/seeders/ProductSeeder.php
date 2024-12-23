<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->create([
            "name" => "Samsung Galaxy S 20",
            "description" => "camera,gorilla glass",
            "price" => 20000,
            "category_id" => 1,
            "image" => "image.jpg"
        ]);
        Product::query()->create([
            "name" => "Mixer",
            "description" => "mix ingredients",
            "price" => 5000,
            "category_id" => 2,
            "image" => "image.jpg"
        ]);
    }
}
