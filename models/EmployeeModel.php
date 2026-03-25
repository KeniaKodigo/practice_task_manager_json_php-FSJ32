<?php

class EmployeeModel{

    //consulta para obtener los empleados de la base de datos
    public static function all(){
        //nos conectamos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->query("SELECT id_employee, name FROM employees");
        $query->execute(); //true/false
        $list_employees = $query->fetchAll(PDO::FETCH_ASSOC); //[arreglo asociativo]
        return $list_employees;
    }
}

//return - print_r, console.log()