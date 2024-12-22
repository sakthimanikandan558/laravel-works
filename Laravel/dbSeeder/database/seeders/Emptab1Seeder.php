<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Emptab1;
use App\Models\Emptab1 as ModelsEmptab1;
use Carbon\Carbon;

class Emptab1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emptab1::truncate();
        $employees=[
            [
                'name'=>'Sakthi',
                'position'=>'Employee',
                'dept'=>'IT',
                'salary'=>80000,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Sankari',
                'position'=>'Employee',
                'dept'=>'IT',
                'salary'=>80000,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Murugan',
                'position'=>'Employee',
                'dept'=>'HR',
                'salary'=>90000,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Rasathi',
                'position'=>'Employee',
                'dept'=>'R&D',
                'salary'=>50000,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=>'Kali',
                'position'=>'Employee',
                'dept'=>'IT',
                'salary'=>50000,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ];
        Emptab1::insert($employees);
        Emptab1::factory()->count(10)->create();
    }
}
