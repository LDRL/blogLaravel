<?php

namespace App\Api\Employees\Repositories;


use App\Api\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class EmployeeRepository implements EmployeeRepositoryInterface
{

    protected $model;

    public function __construct(Employee $employee)
    {
        // parent::__construct($employee);
        $this->model = $employee;
    }

    public function listEmployees(string $order = 'id', string $sort = 'desc'): Collection
    {
        return $this->model->get();
    }

    public function createEmployee(array $data): Employee
    {
        return $this->create($data);
    }

    public function updateEmployee(array $params): Employee
    {
        try {
            $this->model->update($params);
            return $this->findEmployeeById($this->model->id);
        } catch (QueryException $e) {
            throw new EmployeeInvalidArgumentException($e->getMessage());
        }
    }



    public function findEmployeeById(int $id) : Employee
    {
        try{
            // return $this->findOrFail($id);
            return Employee::findOrFail($id);
        }
        catch(ModelNotFoundException $e){
            throw new EmployeeFoundException('Employee not found');

        }

    }
}