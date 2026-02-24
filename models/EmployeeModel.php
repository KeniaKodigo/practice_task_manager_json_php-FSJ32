<?php

class EmployeeModel{
    private static $file_path = "../data/employee.json";

    //ver empleados
    public static function all(){

        if(file_exists(self::$file_path)){
            $data_json = file_get_contents(self::$file_path);
            return json_decode($data_json, true);
        }

        return [];
    }
}