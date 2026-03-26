<?php

require_once "./config/database.php";
require_once "./models/EmployeeModel.php";

class LoginController{

    public static function login($email, $password){
        $employee = EmployeeModel::findByEmailAndPassword($email, $password);

        //condicionando si el empleado existe o no
        if($employee){
            //si empleado existe vamos a validar su rol
            $id_rol = $employee['id_rol'];
            // sesiones
            $_SESSION['employee'] = $employee['name'];
            $_SESSION['id_employee'] = $employee['id_employee'];

            if($id_rol == 1){
                header("Location: home_admin.php");
            }else{
                header("Location: home_employee.php");
            }
        }else{
            echo "<div class='alert alert-danger' role='alert'>
                    Credenciales Incorrectas! Verifica tu correo y contraseña
                </div>";
        }
        
    }

    public static function logout(){
        //continuamos la sesion activa
        session_start();

        // eliminamos los datos de la sesion
        session_destroy();

        // eliminamos las sesiones
        session_unset();

        header("Location: index.php");
    }
}