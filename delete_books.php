<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
    <title>Eliminar libro</title>
</head>
<body>
    <div class = "container">
    <h2>Eliminar libro</h2>
    <form method="post" action="delete_books.php">
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
            </select><br>
            <input type="submit" value="Eliminar">
        </form>
    </div>
</body>
</html>

<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the ISBN is sent via the form
    $ISBN = $_POST['ISBN'];

    // Prepare and execute the SQL DELETE query
    $query = "DELETE FROM libros WHERE ISBN = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $ISBN);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_books.php");
        exit();
    } else {
        // Error while deleting
        echo "Error borrando libro: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
