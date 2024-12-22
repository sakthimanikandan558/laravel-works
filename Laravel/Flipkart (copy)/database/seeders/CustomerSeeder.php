<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::truncate();
        $customer=[
            [
                'name'=>'Sakthi',
                'shipping_address'=>'Sivakasi.' ,
                'phone'=>'9025712828',
                'email'=>'sakthiuchiha007@gmail.com',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Sankari',
                'shipping_address'=>'Sankarankovil.' ,
                'phone'=>'9025819022',
                'email'=>'sankari@gmail.com',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],            
            [
                'name'=>'Kali',
                'shipping_address'=>'Madurai' ,
                'phone'=>'90128289012',
                'email'=>'kali@gmail.com',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],            
            [
                'name'=>'Murugan',
                'shipping_address'=>'Srivi' ,
                'phone'=>'9025711828',
                'email'=>'murugan@gmail.com',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],            
            [
                'name'=>'Rasathi',
                'shipping_address'=>'Sivakasi' ,
                'phone'=>'8025712828',
                'email'=>'shami@gmail.com',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Priya ka',
                'shipping_address'=>'Sivakasi' ,
                'phone'=>'7025712828',
                'email'=>'priyasweety@gmail.com',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Balaji',
                'shipping_address'=>'Sivakasi' ,
                'phone'=>'8025112128',
                'email'=>'Balaji@gmail.com',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Ganesh',
                'shipping_address'=>'VNR' ,
                'phone'=>'8025112190',
                'email'=>'Ganesh@gmail.com',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name' => 'Arjun',
                'shipping_address' => 'Chennai',
                'phone' => '9812345670',
                'email' => 'arjun@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Rohit',
                'shipping_address' => 'Mumbai',
                'phone' => '9123456789',
                'email' => 'rohit@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Priya',
                'shipping_address' => 'Bangalore',
                'phone' => '9345678901',
                'email' => 'priya@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Ananya',
                'shipping_address' => 'Kolkata',
                'phone' => '9234567890',
                'email' => 'ananya@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Vikram',
                'shipping_address' => 'Hyderabad',
                'phone' => '9845678902',
                'email' => 'vikram@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Neha',
                'shipping_address' => 'Pune',
                'phone' => '9987654321',
                'email' => 'neha@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Suresh',
                'shipping_address' => 'Ahmedabad',
                'phone' => '9823456789',
                'email' => 'suresh@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Meera',
                'shipping_address' => 'Jaipur',
                'phone' => '9734567890',
                'email' => 'meera@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Amit',
                'shipping_address' => 'Delhi',
                'phone' => '9876543210',
                'email' => 'amit@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Kaviya',
                'shipping_address' => 'Lucknow',
                'phone' => '9654321890',
                'email' => 'kaviya@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
                
        ];
        Customer::insert($customer);
    }
}
