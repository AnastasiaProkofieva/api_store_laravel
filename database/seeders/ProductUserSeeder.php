<?php

namespace Database\Seeders;


use App\Models\ProductUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductUser::query()->create([
            "product_id" => 1,
            "user_id" => 2,
            "product_name" => "Product name",
            "price" => 10000,


        ]);
        ProductUser::query()->create([
            "product_id" => 2,
            "user_id" => 2,
            "product_name" => "Mixer",
            "price" => 5000,

        ]);
    }
}
