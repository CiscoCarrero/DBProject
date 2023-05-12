<!DOCTYPE html>
<html>
<center>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
    <title>Agregar empleados</title>
</head>
<body>
    <div class="container">
        <h2>Agregar Empleado</h2>
        <form method="post" action="add_empleados.php">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required><br>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad"><br>

            <label for="posicion">Posición:</label>
            <input type="text" name="posicion" id="posicion"><br>

            <input type="submit" value="Agregar">
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

    // Preparar y ejecutar la consulta SQL INSERT
    $query = "INSERT INTO empleados (empleado_id, nombre, edad, posicion) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "isss", $empleado_id, $nombre, $edad, $posicion);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_empleados.php");
        exit();
    } else {
        // Error al insertar
        echo "Error al insertar datos: " . mysqli_error($conn);
    }

    // Cerrar la consulta y la conexión a la base de datos
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?> 
