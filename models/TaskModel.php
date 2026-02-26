<?php

class TaskModel{
    public int $id_task;
    public string $title;
    public string $description;
    public string $date;
    public string $status;
    public int $id_employee;

    //atributo que va servir para manejar la url del json de las tareas
    private static $file_path = "../data/tasks.json";

    public function __construct($title, $description, $id_employee)
    {
        $this->title = $title;
        $this->description = $description;
        $this->date = date("Y-m-d"); //capturamos la fecha actual
        $this->status = "Pendiente";
        $this->id_employee = $id_employee;
    }

    //obteniendo todos los datos del json
    public static function all(){
        if(file_exists(self::$file_path)){
            //si existe el json, obtenemos los datos
            $data_json = file_get_contents(self::$file_path);
            //print_r($data_json);
            /**
             * json_encode => codificar los datos a un json puro
             * json_decode => decodificar los datos a un PHP (arreglo)
             */
            return json_decode($data_json, true); //[]
        }

        return [];
    }

    //metodo que permite actualizar el json
    private static function loadJSON($array_tasks){
        $data_json = json_encode($array_tasks, JSON_PRETTY_PRINT);
        file_put_contents(self::$file_path, $data_json);
    }

    //metodo para guardar una nueva tarea
    public function save(){
        $array_tasks = self::all(); //[]

        //seleccionamos el ultimo elemento del arreglo de tareas
        $ultimo = end($array_tasks);

        //agregar un elemento al arreglo (array_push())
        $array_tasks[] = [
            "id_task" => $ultimo["id_task"] + 1,
            "title" => $this->title,
            "description" => $this->description,
            "date" => $this->date,
            "status" => $this->status,
            "id_employee" => $this->id_employee
        ];

        self::loadJSON($array_tasks);
        return "Se ha guardado correctamente";
    }

    public static function edit($id, $title, $description){
        $array_tasks = self::all();

        //variable para validar si la tarea existe o no
        $found_task = false;

        //iteramos el arreglo de tareas para verificar y actualizar la tarea
        foreach($array_tasks as &$task){ //referencia
            if($task["id_task"] == $id){
                //si el id coincide con alguna tarea del json, entonces actualizamos la variable
                $found_task = true;
                $task["title"] = $title;
                $task["description"] = $description;
                //saltamos las otras tareas (si es que hay) para evitar procesos innecesarios
                break;
            }
        }

        if($found_task){
            //si la tarea se encontro, actualiza el JSON
            self::loadJSON($array_tasks);
        }else{
            return "No se encontro la tarea";
        }
    }

    //eliminar una tarea
    public static function delete($id_task){
        //filtrar las tareas que sean diferentes al id de la tarea

        $array_tasks = self::all();

        //array_tasks.filter(task => task.id_task != id_task)
        $tasks = array_filter($array_tasks, function ($task) use ($id_task){
            return $task["id_task"] != $id_task;
        });

        //reindexamos el array
        $tasks = array_values($tasks);
        self::loadJSON($tasks);
    }
}