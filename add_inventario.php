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
    <h2>Add Inventario</h2>
        <form method="post" action="add_inventario.php">
            <label for="numero">Numero:</label>
            <input type="number" name="numero" id="numero" required><br>

            <label for="ISBN">Libro ISBN:</label>
            <select name="ISBN" id="ISBN" required>
                <?php
                require 'db.php';
                $query = "SELECT ISBN FROM libros";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"{$row['ISBN']}\">{$row['ISBN']}</option>";
                }
                mysqli_close($conn);
                ?>
            </select>

            <!-- <label for="ISBN">Book ID:</label>
            <input type="text" name="ISBN" id="ISBN"><br> -->

            <label for="price">Precio:</label>
            <input type="number" name="price" id="price"><br>

            <label for="quantity">Cantidad:</label>
            <input type="number" name="quantity" id="quantity"><br>

            <!-- <label for="empleado_id">Empleado ID:</label>
            <input type="number" name="empleado_id" id="empleado_id"><br> -->

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
    $numero = $_POST['numero'];
    $ISBN = $_POST['ISBN'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Prepare and execute the SQL INSERT statement
    $query = "INSERT INTO inventario (numero, ISBN, price, quantity) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $numero, $ISBN, $price, $quantity);
    
    if (mysqli_stmt_execute($stmt)) {
        // Insert successful
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_inventario.php");
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