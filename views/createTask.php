<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Registro de Tareas</title>
</head>
<body>
    <main class="container">
        <h1 class="my-4">Crear Tarea</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="">Id Tarea</label>
                <input type="number" class="form-control" name="id_task" >
            </div>
            <div class="mb-3">
                <label for="">Titulo</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="">Descripcion</label>
                <input type="text" class="form-control" name="description">
            </div>

            <div class="mb-3">
                <label for="">Asignar Empleado</label>
                <select id="" class="form-control" name="id_employee">
                    <option value="">Selecciona un empleado</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Crear Tarea">
        </form>
    </main>
</body>
</html>