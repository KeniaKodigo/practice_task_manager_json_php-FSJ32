<?php

require_once "../models/TaskModel.php";
require_once "../controller/ManagerController.php";
require_once "../models/EmployeeModel.php";

//$task = new TaskModel(); //aqui hacemos referencia que creaste un objeto
// print_r($task->all());

$task = TaskModel::all();
//print_r($task);

$employees = EmployeeModel::all();
//print_r($employees);

$task1 = new TaskModel(100, "CONTANDO..","datos...",4);
ManagerController::createTask($task1);
//$task1->save();