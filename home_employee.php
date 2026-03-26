<?php 
    session_start(); 
    require_once __DIR__ . "/controller/ManagerController.php";

    $list_tasks = ManagerController::getTaksByEmployee();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <h2>Bienvenido/a <?php echo $_SESSION['employee']; ?>!</h2>

        <h4>Lista de tus tareas</h4>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Estado</th>
            </thead>
            <tbody>
                <?php foreach($list_tasks as $task) { ?>
                    <tr>
                        <td><?php echo $task["id_task"];  ?></td>
                        <td><?php echo $task["title"];  ?></td>
                        <td><?php echo $task["description"];  ?></td>
                        <td><?php echo $task["status"];  ?></td>
                    </tr>
                    
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>