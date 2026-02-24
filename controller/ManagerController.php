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
        try{
            TaskModel::edit($id_task, $title, $description);
            header("location: ../views/listTasks.php");
        }catch(Error $error){
            return "Error al actualizar los datos de la tarea: " . $error;
        }
    }

    public static function deleteTask($id_task)
    {
        try{
            TaskModel::delete($id_task);
            header("location: ../views/listTasks.php");
        }catch(Error $error){
            return "Error al eliminar una tarea: " . $error;
        }
    }
}