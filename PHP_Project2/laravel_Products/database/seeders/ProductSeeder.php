<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $products = [];
        // foreach (range(1, 15) as $index) {
        //     $products[] = [
        //         'name' => fake()->sentence(),
        //         'price' => fake()->randomDigitNotZero(0) * 100,
        //         'category_id' => rand(2, 5),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // DB::table('products')->insert($products);

        // Product::factory(10)->create();
    }
}