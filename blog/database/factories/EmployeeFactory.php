<?php

namespace Database\Factories;

use App\Models\Employee;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory{
    protected $model = Employee::class;

    public function definition(){
        return[
            'name' =>'Luis',
            'last_name' =>'Reyes',
            'job' =>'job',
            'phone' =>545,
            'address' => 'city',
            'age' => 23
        ];
    }
}
// $factory->define(Employee::class, function (Faker $faker){
//     return[
//         'name' =>'Luis',
//         'last_name' =>'Reyes',
//         'job' =>'job',
//         'phone' =>545,
//         'address' => 'city',
//         'age' => 23
//     ];

// });


