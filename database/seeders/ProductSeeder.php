<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(array(
            'name' => 'Item1',
            'price' => 100,
            'description' => 'Product description',
			'business_id' => 1,
            'img' => 'template\assets\img\avatar-1.jpg',
        ));
        Product::create(array(
            'name' => 'Item2',
            'price' => 1000,
			'business_id' => 2,
            'description' => 'Product description',
            'img' => 'template\assets\img\avatar-2.jpg',
        ));
    }
}
