<?php

namespace Database\Seeders;


use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::query()->create([
            "name" => "Phones",
        ]);
        Category::query()->create([
            "name" => "Other devices",
        ]);
    }
}
