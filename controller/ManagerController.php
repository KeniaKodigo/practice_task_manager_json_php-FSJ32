<?php

//llamando archivos externos
require_once "EmployeeController.php";
require_once "../interfaces/ICRUDTask.php";

class ManagerController extends EmployeeController implements ICRUDTask{

    //implementando los metodos de la interfaz
    public static function getTask()
    {
        try{
            $tasks = TaskModel::all(); //mapeado
            return $tasks; //[]
        }catch(Error $error){
            return "Error al obtener las tareas: " . $error;
        }
    }

    public static function createTask(TaskModel $task)
    {
        try{
            $task->save();
            //redireccionar a la vista de la tabla
            header("location: ../views/listTasks.php");
        }catch(Error $error){
            return "Error al crear una tarea: " . $error;
        }
        
    }

    public static function editTask($id_task, $title, $description)
    {
        
    }
}