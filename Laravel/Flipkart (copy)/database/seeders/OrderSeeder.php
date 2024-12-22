<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::truncate();
        $order=[
            [
                'product_id'=>1,
                'customer_id'=>1 ,
                'quantity'=>2,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>1,
                'customer_id'=>2 ,
                'quantity'=>4,
                'review'=>'very good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>1,
                'customer_id'=>4 ,
                'quantity'=>1,
                'review'=>'bad',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>1,
                'customer_id'=>6 ,
                'quantity'=>1,
                'review'=>'bad',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>3,
                'customer_id'=>1 ,
                'quantity'=>1,
                'review'=>'very very very good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>3,
                'customer_id'=>2 ,
                'quantity'=>2,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>3,
                'customer_id'=>3 ,
                'quantity'=>2,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>3,
                'customer_id'=>4 ,
                'quantity'=>1,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>3,
                'customer_id'=>5 ,
                'quantity'=>5,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>4,
                'customer_id'=>6 ,
                'quantity'=>1,
                'review'=>'bad',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>4,
                'customer_id'=>2 ,
                'quantity'=>1,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>4,
                'customer_id'=>8 ,
                'quantity'=>2,
                'review'=>'very good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>4 ,
                'quantity'=>2,
                'review'=>'very good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],            
            [
                'product_id'=>5,
                'customer_id'=>1 ,
                'quantity'=>3,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],            
            [
                'product_id'=>5,
                'customer_id'=>7 ,
                'quantity'=>3,
                'review'=>'bad',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],            
            [
                'product_id'=>5,
                'customer_id'=>8 ,
                'quantity'=>5,
                'review'=>'very good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],            
            [
                'product_id'=>5,
                'customer_id'=>5 ,
                'quantity'=>2,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],            
            [
                'product_id'=>5,
                'customer_id'=>6 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>10 ,
                'quantity'=>8,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>11 ,
                'quantity'=>3,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>12 ,
                'quantity'=>1,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>13 ,
                'quantity'=>6,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>14 ,
                'quantity'=>8,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>15 ,
                'quantity'=>3,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>16 ,
                'quantity'=>8,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>5,
                'customer_id'=>17 ,
                'quantity'=>3,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>1 ,
                'quantity'=>2,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>2 ,
                'quantity'=>2,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>3 ,
                'quantity'=>1,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>4 ,
                'quantity'=>5,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>5 ,
                'quantity'=>5,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>6 ,
                'quantity'=>1,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>7 ,
                'quantity'=>2,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>8 ,
                'quantity'=>3,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>9 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>10 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>11 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>12 ,
                'quantity'=>1,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>13 ,
                'quantity'=>14,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>15 ,
                'quantity'=>2,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>17 ,
                'quantity'=>1,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>6,
                'customer_id'=>18 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>7,
                'customer_id'=>4 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>7,
                'customer_id'=>8 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>7,
                'customer_id'=>9 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>7,
                'customer_id'=>10 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>8,
                'customer_id'=>5 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>8,
                'customer_id'=>8 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>8,
                'customer_id'=>9 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>8,
                'customer_id'=>10 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>9,
                'customer_id'=>5 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>9,
                'customer_id'=>8 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>9,
                'customer_id'=>10 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>9,
                'customer_id'=>1 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>9,
                'customer_id'=>2 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'product_id'=>9,
                'customer_id'=>12 ,
                'quantity'=>4,
                'review'=>'good',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ];
        Order::insert($order);
    }
}
