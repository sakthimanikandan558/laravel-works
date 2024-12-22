<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Product::truncate();
        $products=[
                [
                    'seller_id'=>1,
                    'product_name'=>'Boat Airdops 311 Pro',
                    'product_description'=>'High-quality, wireless earbuds with immersive sound, long battery life, and a comfortable fit.' ,
                    'product_price'=>999,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ],
                [   
                    'seller_id'=>1,
                    'product_name'=>'Apple AirPods Pro',
                    'product_description'=>'High-quality, wireless earbuds with immersive sound, long battery life,
                    and a comfortable fit.' ,
                    'product_price'=>19999,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ],
                [   
                    'seller_id'=>1,
                    'product_name'=>'Moto Edge 50 Fusion',
                    'product_description'=>'A sleek, high-performance smartphone with a stunning display, advanced camera features,
                    and a comfortable fit.' ,
                    'product_price'=>25999,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ],
                [   
                    'seller_id'=>1,
                    'product_name'=>'Samsung Fold 6',
                    'product_description'=>'A cutting-edge foldable smartphone with a seamless large display, powerful performance.' ,
                    'product_price'=>165000,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ],
                [   
                    'seller_id'=>1,
                    'product_name'=>'Realme 12 Pro',
                    'product_description'=>'A feature-packed smartphone offering a vibrant display, fast performance, and impressive camera.' ,
                    'product_price'=>25999,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ],
                [
                    'seller_id' => 1,
                    'product_name' => 'Sony WH-1000XM4',
                    'product_description' => 'Industry-leading noise-cancelling headphones with exceptional sound quality, long battery life, and a comfortable fit.',
                    'product_price' => 29999,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'seller_id' => 1,
                    'product_name' => 'Samsung Galaxy S21 Ultra',
                    'product_description' => 'A premium smartphone with a stunning display, advanced camera system, and powerful performance.',
                    'product_price' => 104999,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'seller_id' => 1,
                    'product_name' => 'Dyson V11 Absolute Pro',
                    'product_description' => 'A high-performance cordless vacuum cleaner with powerful suction and intelligent cleaning modes.',
                    'product_price' => 52900,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'seller_id' => 1,
                    'product_name' => 'Apple MacBook Pro 13-inch',
                    'product_description' => 'A powerful laptop with the M1 chip, delivering incredible performance and battery life in a sleek design.',
                    'product_price' => 122900,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'seller_id' => 1,
                    'product_name' => 'LG 55-inch OLED TV',
                    'product_description' => 'A stunning 4K OLED TV with vibrant colors, deep blacks, and a sleek design for an immersive viewing experience.',
                    'product_price' => 139999,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
                
                    
            ];
            Product::insert($products);
    }
}
