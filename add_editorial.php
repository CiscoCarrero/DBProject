<!DOCTYPE html>
<html>
<center>
<head>
    <title>Add Editorial</title>
</head>
<body>
    <h2>Add Editorial</h2>
    <form method="post" action="add_editorial.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" id="telefono"><br>

        <input type="submit" value="Add">
    </form>
</body>
</center>
</html>
<?php
// Assuming you have already established a database connection
require 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Prepare and execute the SQL INSERT statement
    $query = "INSERT INTO editorial (nombre, direccion, email, telefono) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $nombre, $direccion, $email, $telefono);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_editorial.php");
        exit();
    } else {
        // Insert failed
        echo "Error inserting data: " . mysqli_error($conn);
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
añadelo al final de show_editorial

