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

    public function __construct($id, $title, $description, $id_employee)
    {
        $this->id_task = $id;
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

    //metodo para guardar una nueva tarea
    public function save(){
        $array_tasks = self::all(); //[]
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

        //formateando el arreglo de php a json
        $data_json = json_encode($array_tasks, JSON_PRETTY_PRINT);
        //actualizando el json para que agregue el nuevo elemento
        file_put_contents(self::$file_path, $data_json);
        return "Se ha guardado correctamente";
    }

    public function test(){

    }
}