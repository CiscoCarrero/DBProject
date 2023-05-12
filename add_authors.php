<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
</head>
<center>
<body>
    <div class="container">
    <h2>Add Autor</h2>
        <form method="post" action="add_authors.php">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required><br>

            <label for="bio">Biography:</label>
            <textarea name="bio" id="bio"></textarea><br>

            <label for="fechaNac">Fecha de Nacimiento:</label>
            <input type="date" name="fechaNac" id="fechaNac"><br>

            <label for="estatus">Estatus:</label>
            <input type="text" name="estatus" id="estatus"><br>

            <input type="submit" value="Add">
        </form>
    </div>
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
    $bio = $_POST['bio'];
    $fechaNac = $_POST['fechaNac'];
    $estatus = $_POST['estatus'];

    // Prepare and execute the SQL INSERT statement
    $query = "INSERT INTO autor (nombre, bio, fechaNac, estatus) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $nombre, $bio, $fechaNac, $estatus);
    
    if (mysqli_stmt_execute($stmt)) {
        // Insert successful
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_authors.php");
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

