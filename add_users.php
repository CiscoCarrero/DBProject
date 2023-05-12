<!DOCTYPE html>
<html>
<center>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
    <title>Añadir usuarios</title>
</head>
<body>
    <div class = "container">
        <h2>Add User</h2>
        <form method="post" action="add_users.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>

            <label for="genero">Género:</label>
            <select name="genero" id="genero" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="No binario">No binario</option>
                <option value="Otro">Otro</option>
            </select><br>

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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];

    // Prepare and execute the SQL INSERT statement
    $query = "INSERT INTO usuario (username, password, edad, email, genero) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssiss", $username, $password, $edad, $email, $genero);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_users.php");
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
