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
        //
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
                    
            ];
            Product::insert($products);
    }
}
