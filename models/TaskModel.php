<?php

class TaskModel{
    public int $id_task;
    public string $title;
    public string $description;
    public string $date;
    public string $status;
    public int $id_employee;

    public function __construct($title, $description, $id_employee)
    {
        $this->title = $title;
        $this->description = $description;
        $this->date = date("Y-m-d"); //capturamos la fecha actual
        $this->status = "Pendiente";
        $this->id_employee = $id_employee;
    }

    //obteniendo todos los datos de la base de datos
    public static function all(){
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->query("SELECT tasks.id_task, tasks.title, tasks.description, tasks.status, tasks.id_employee, employees.name AS employee FROM tasks INNER JOIN employees ON tasks.id_employee = employees.id_employee ORDER BY tasks.id_task ASC");
        $query->execute(); //true/false
        $list_tasks = $query->fetchAll(PDO::FETCH_ASSOC); //[arreglo asociativo]
        return $list_tasks;
    }

    //metodo para guardar una nueva tarea en la base de datos
    public function save(){
        $pdo = Connection::getInstance()->getConnection();
        //prepare() -> preparar consultas y podemos utilizar parametros/argumentos
        $query = $pdo->prepare("INSERT INTO tasks (title, description, date_task, status, id_employee) VALUES (?, ?, ?, ?, ?)");
        $result = $query->execute(["$this->title", "$this->description", "$this->date", "$this->status", $this->id_employee]);
        return $result; //true/false
    }

    public static function edit($id, $title, $description){
        $pdo = Connection::getInstance()->getConnection();
        //prepare() -> preparar consultas y podemos utilizar parametros/argumentos
        $query = $pdo->prepare("UPDATE tasks SET title = ?, description = ? WHERE id_task = ?");
        $result = $query->execute(["$title", "$description", $id]);
        return $result; //true/false
    }

    //eliminar una tarea
    public static function delete($id_task){
        $pdo = Connection::getInstance()->getConnection();
        //prepare() -> preparar consultas y podemos utilizar parametros/argumentos
        $query = $pdo->prepare("DELETE FROM tasks WHERE id_task = ?");
        $result = $query->execute([$id_task]);
        return $result; //true/false
    }
}