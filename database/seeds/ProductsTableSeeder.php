<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = [
            'name' => 'Learn Website Designing',
            'image' => 'uploads/products/book1.png',
            'price' => 2400,
            'description' => 'somethingsomethingsomethingsomethingsomethingsomethingsomething somethingsomethingsomethingsomethingsomething somethingsomething'
        ];

        $p2 = [
            'name' => 'Learn Website Developing',
            'image' => 'uploads/products/book1.png',
            'price' => 8000,
            'description' => 'somethingsomethingsomethingsomethingsomethingsomethingsomething somethingsomethingsomethingsomethingsomething somethingsomething'
        ];

        Product::create($p1);
        Product::create($p2);
    }
}
