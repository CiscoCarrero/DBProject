<!DOCTYPE html>
<html>
<center>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
    <title>Modificar empleado</title>
</head>
<body>
    <div class="container">
    <h2>Modificar Empleado</h2>
    <form method="post" action="update_empleados.php">
        <label for="empleado_id">ID:</label>
        <input type="number" name="empleado_id" id="empleado_id" required><br>

        <label for="nombre">Nuevo nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="edad">Nueva edad:</label>
        <input type="number" name="edad" id="edad"><br>

        <label for="posicion">Nueva posición:</label>
        <input type="text" name="posicion" id="posicion"><br>

        <input type="submit" value="Actualizar">
    </form>
    </div>
</body>
</center>
</html>
<?php
// Asumiendo que ya se ha establecido una conexión a la base de datos
require 'db.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $empleado_id = $_POST['empleado_id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $posicion = $_POST['posicion'];

    // Preparar y ejecutar la consulta SQL UPDATE
    $query = "UPDATE empleados SET nombre = ?, edad = ?, posicion = ? WHERE empleado_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $nombre, $edad, $posicion, $empleado_id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_empleados.php");
        exit();
    } else {
        // Error al actualizar
        echo "Error al actualizar datos: " . mysqli_error($conn);
    }

    // Cerrar la consulta y la conexión a la base de datos
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
