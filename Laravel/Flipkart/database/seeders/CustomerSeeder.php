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
                
        ];
        Customer::insert($customer);
    }
}
