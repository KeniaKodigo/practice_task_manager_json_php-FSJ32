<?php 
    require "./controller/LoginController.php";
    session_start(); 

    if(isset($_POST['logout'])){
        LoginController::logout();
    }
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
        <h2>Bienvenido Admin!</h2>
        <p><strong>🛠️ Administrador:</strong> <?php echo $_SESSION['employee']; ?></p>
        <p>Aqui encontraras la seccion de mantenimiento y gestion de tareas</p>
        <a href="./views/listTasks.php">Gestion de Tareas</a>

        <form action="" method="post">
            <button type="submit" class="btn btn-danger" name="logout">Cerrar Sesion</button>
        </form>
    </main>
</body>
</html>