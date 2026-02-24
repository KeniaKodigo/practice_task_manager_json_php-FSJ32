<?php

require_once "../models/EmployeeModel.php";

class EmployeeController {
    protected int $id_employee;
    protected string $name;
    protected string $phone;
    protected string $email;
    private string $password;
    private float $salary;

    public function getPassword(){
        return $this->password;
    }

    //capturamos una nueva password
    public function setPassword($password){
        $this->password = $password;
    }

    public function setSalary($salary){
        $this->salary = $salary;
    }

    public static function getEmployees()
    {
        try{
            $employees = EmployeeModel::all();
            return $employees;
        }catch(Error $error){
            return "Error al obtener los empleados: " . $error;
        }
    }
}