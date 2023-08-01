<?php

namespace App\Api\Employees\Repositories\Interfaces;



use App\Models\Employee;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Support\Collection;


interface EmployeeRepositoryInterface
{

    public function listEmployees(string $order = 'id', string $sort = 'desc'): Collection;

    public function createEmployee(array $params) : Employee;
    public function updateEmployee(array $params): Employee;

    public function findEmployeeById(int $id) : Employee;

}