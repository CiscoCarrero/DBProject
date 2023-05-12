<!DOCTYPE html>
<html>
<center>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
    <title>Agregar Orden</title>
</head>
<body>
    <div class="container">
    <h2>Agregar Orden</h2>
    <form method="post" action="add_ordenes.php">
        <label for="numOrden">Número de Orden:</label>
        <input type="number" name="numOrden" id="numOrden" required><br>

        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="book_id">ID de Libro:</label>
        <input type="text" name="book_id" id="book_id"><br>

        <label for="fecha_de_pedido">Fecha de Pedido:</label>
        <input type="date" name="fecha_de_pedido" id="fecha_de_pedido"><br>

        <input type="submit" value="Agregar">
    </form>
</body>
</div>
</center>
</html>
<?php
// Asumiendo que ya se ha establecido una conexión a la base de datos
require 'db.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $numOrden = $_POST['numOrden'];
    $username = $_POST['username'];
    $book_id = $_POST['book_id'];
    $fecha_de_pedido = $_POST['fecha_de_pedido'];

    // Preparar y ejecutar la consulta SQL INSERT
    $query = "INSERT INTO ordenes (numOrden, username, book_id, fecha_de_pedido) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "isss", $numOrden, $username, $book_id, $fecha_de_pedido);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_ordenes.php");
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