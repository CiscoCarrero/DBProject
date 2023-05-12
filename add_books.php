<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<center>
<body>
    <h2>Add Book</h2>
    <form method="post" action="add_books.php">
        <label for="ISBN">ISBN:</label>
        <input type="text" name="ISBN" id="ISBN" required><br>

        <label for="autor_id">Author:</label>
        <?php
        // Assuming you have already established a database connection
        require 'db.php';

        // Retrieve the authors from the database
        $query = "SELECT autor_id, nombre FROM autor";
        $result = mysqli_query($conn, $query);

        // Check if any authors are found
        if (mysqli_num_rows($result) > 0) {
            echo '<select name="autor_id" id="autor_id">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['autor_id'] . '">' . $row['nombre'] . '</option>';
            }
            echo '</select>';
        } else {
            echo 'No authors found.';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
        <br>

        <label for="editorial_nombre">Editorial:</label>
        <?php
        // Assuming you have already established a database connection
        require 'db.php';

        // Retrieve the editorials from the database
        $query = "SELECT nombre FROM editorial";
        $result = mysqli_query($conn, $query);

        // Check if any editorials are found
        if (mysqli_num_rows($result) > 0) {
            echo '<select name="editorial_nombre" id="editorial_nombre">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
            }
            echo '</select>';
        } else {
            echo 'No editorials found.';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
        <br>

        <label for="nombre">Book Name:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="anio_publ">Publication Year:</label>
        <input type="text" name="anio_publ" id="anio_publ" required><br>

        <label for="idioma">Language:</label>
        <input type="text" name="idioma" id="idioma" required><br>

        <label for="resumen">Summary:</label>
        <textarea name="resumen" id="resumen"></textarea><br>

        <input type="submit" value="Add">
    </form>
</body>
</center>
<?php
// Assuming you have already established a database connection
require 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $ISBN = $_POST['ISBN'];
    $autor_id = $_POST['autor_id'];
    $editorial_nombre = $_POST['editorial_nombre'];
    $nombre = $_POST['nombre'];
    $anio_publ = $_POST['anio_publ'];
    $idioma = $_POST['idioma'];
    $resumen = $_POST['resumen'];

    // Prepare and execute the SQL INSERT statement
    $query = "INSERT INTO libros (ISBN, autor_id, editorial_nombre, nombre, anio_publ, idioma, resumen) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sisssss", $ISBN, $autor_id, $editorial_nombre, $nombre, $anio_publ, $idioma, $resumen);

    if (mysqli_stmt_execute($stmt)) {
        // Insert successful
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_books.php");
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
</html>
