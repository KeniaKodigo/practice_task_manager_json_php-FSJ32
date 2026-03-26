<?php
    session_start();
    require_once "./controller/LoginController.php";

    if(isset($_POST["email"], $_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        LoginController::login($email,$password);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Gestion de Tareas</title>
</head>
<body>
    <h1 class="text-center mt-5">Gestion de Tareas y Empleados PHP</h1>
    <div class="my-5">
        <section class="d-flex justify-content-center">
            <form action="" method="POST">
                <label for="username">Correo Electronico:</label>
                <input type="text" class="form-control" id="username" name="email" required>
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <br>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>   
            </form>
        </section>
    </div>
</body>
</html>