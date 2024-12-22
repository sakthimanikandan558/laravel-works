<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::find(1); 
        $image1 = $product1->image()->create(['url'=>'https://m.media-amazon.com/images/I/51rtefpsNIL._AC_UF1000,1000_QL80_.jpg']);
        $image1->save();

        $product2 = Product::find(2); 
        $image2 = $product2->image()->create(['url'=>'https://m.media-amazon.com/images/I/71zny7BTRlL._AC_UF1000,1000_QL80_.jpg']);
        $image2->save();

        $product3 = Product::find(3); 
        $image3 = $product3->image()->create(['url'=>'https://m.media-amazon.com/images/I/71ZJ6bsARtL.jpg']);
        $image3->save();

        $product4 = Product::find(4); 
        $image4 = $product4->image()->create(['url'=>'https://m.media-amazon.com/images/I/61hGx-pPUVL._AC_UF1000,1000_QL80_.jpg']);
        $image4->save();

        $product5 = Product::find(5); 
        $image = $product5->image()->create(['url'=>'https://m.media-amazon.com/images/I/81k8QKxg+jL.jpg']);
        $image->save();

        $product6 = Product::find(6); 
        $image = $product6->image()->create(['url'=>'https://m.media-amazon.com/images/I/510cs9VwjUL._AC_UF1000,1000_QL80_.jpg']);
        $image->save();

        $product7 = Product::find(7); 
        $image = $product7->image()->create(['url'=>'https://m.media-amazon.com/images/I/917nPCOw9-L._AC_UF1000,1000_QL80_.jpg']);
        $image->save();

        $product8 = Product::find(8); 
        $image = $product8->image()->create(['url'=>'https://m.media-amazon.com/images/I/31Jas6THshL._SX300_SY300_QL70_FMwebp_.jpg']);
        $image->save();

        $product9 = Product::find(9); 
        $image = $product9->image()->create(['url'=>'https://m.media-amazon.com/images/I/51hJIsWMagL._AC_UF1000,1000_QL80_.jpg']);
        $image->save();

        $product10 = Product::find(10); 
        $image = $product10->image()->create(['url'=>'https://m.media-amazon.com/images/I/61uoL4HpeAL._AC_UF350,350_QL80_.jpg']);
        $image->save();
    }
}
