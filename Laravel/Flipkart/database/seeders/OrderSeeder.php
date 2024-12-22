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
                
        ];
        Order::insert($order);
    }
}
