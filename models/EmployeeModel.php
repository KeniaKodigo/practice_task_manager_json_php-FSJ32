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


    //metodo que devuelve el empleado en base a su correo y contraseña
    public static function findByEmailAndPassword($email, $password){
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT id_employee, name, email, id_rol FROM employees WHERE email = ? AND password = ?");
        $query->execute([$email, $password]);
        $result = $query->fetch(PDO::FETCH_ASSOC); //[]
        return $result; 
    }

    public static function findTaskByEmployee(){
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT id_task, title, description, status FROM tasks WHERE id_employee = ?");
        $query->execute([$_SESSION['id_employee']]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //[]
        return $result; 
    }
}

//return - print_r, console.log()