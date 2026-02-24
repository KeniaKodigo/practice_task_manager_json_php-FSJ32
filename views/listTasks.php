<?php
    require_once "../controller/ManagerController.php";
    //llamando el metodo del controlador
    $array_tasks = ManagerController::getTask();
    //print_r($array_tasks);

    //validando los datos para editar la tarea
    if(isset($_POST["idTask"], $_POST["title"], $_POST["description"])){
        $title = $_POST["title"];
        $descripcion = $_POST["description"];
        $id = (int) $_POST["idTask"];

        ManagerController::editTask($id, $title, $descripcion);
    }

    //validamos para eliminar una tarea
    if(isset($_POST["deleteIdTask"])){
        $id_task = (int) $_POST["deleteIdTask"];
        ManagerController::deleteTask($id_task);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Lista Tareas</title>
</head>
<body>
    <main class="container">
        <h1>Lista de Tareas</h1>
        <a href="./createTask.php" class="btn btn-primary my-4">Crear Tarea</a>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Estado</th>
                <th>Codigo Empleado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <!-- Iterando el arreglo de tareas -->
                <?php foreach($array_tasks as $task) { ?>
                    <tr>
                        <td><?php echo $task["id_task"];  ?></td>
                        <td><?php echo $task["title"];  ?></td>
                        <td><?php echo $task["status"];  ?></td>
                        <td><?php echo $task["id_employee"];  ?></td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $task["id_task"];  ?>"><i class="bi bi-pencil-square"></i></button>
                            <form action="" method="post">
                                <input type="hidden" name="deleteIdTask" value="<?php echo $task["id_task"]; ?>">
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                            </form>
                            
                        </td>
                    </tr>    

                    <!-- Modal -->
                    <div class="modal fade" id="editModal<?php echo $task["id_task"];  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Tarea</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <!-- Agregando el id de la tarea (para saber cual se va a actualizar) -->
                                        <input type="hidden" name="idTask" value="<?php echo $task["id_task"]; ?>">
                                        <div class="mb-3">
                                            <label for="">Titulo</label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $task["title"];  ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Descripcion</label>
                                            <input type="text" class="form-control" name="description" value="<?php echo $task["description"];  ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Actualizar Tarea</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    
                <?php } ?>
            </tbody>
        </table>

        
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>