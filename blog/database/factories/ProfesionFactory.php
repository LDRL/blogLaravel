<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesionFactory extends Factory
{

    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Luis',
            'last_name' => 'Reyes',
            'job' => 'job',
            'phone' => 545,
            'address' => 'city',
            'age' => 23
        ];
    }
}