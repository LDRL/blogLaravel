<?php

namespace Tests\Unit;

use App\Api\Employees\Repositories\EmployeeRepository;
use App\Models\Employee;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /** @test */

    public function it_can_list_all_the_employees()
    {
        //$employee = factory(Employee::class)->create();
        $employee = Employee::factory()->create();
        $employeeRepo = new EmployeeRepository($employee);

        $this->assertCount(1, $employeeRepo->listEmployees());

    }

    /** @test */
    public function it_can_find_the_employee()
    {
        $employee = Employee::factory()->create();
        $employeeRepo = new EmployeeRepository(new Employee);
        $found = $employeeRepo->findEmployeeById($employee->id);

        $this->assertEquals($employee->id, $found->id);
    }

}