<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Emptab1;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emptab1>
 */
class Emptab1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Emptab1::class;
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'position'=>'Employee',
            'dept'=>$this->faker->randomElement(['IT','HR','R&D']),
            'salary'=>$this->faker->numberBetween(30000,100000),
            'created_at'=>$this->faker->dateTimeThisDecade(),
            'updated_at'=>$this->faker->dateTimeThisDecade()
        ];
    }
}
