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
    <h2>Modificar Libro</h2>
    <form method="post" action="update_books.php">
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

            <input type="submit" value="Update">
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
    $ISBN = $_POST['ISBN'];
    $autor_id = $_POST['autor_id'];
    $editorial_nombre = $_POST['editorial_nombre'];
    $nombre = $_POST['nombre'];
    $anio_publ = $_POST['anio_publ'];
    $idioma = $_POST['idioma'];
    $resumen = $_POST['resumen'];

    // Preparar y ejecutar la consulta SQL UPDATE
    $query = "UPDATE libros SET autor_id = ?, editorial_nombre = ?, nombre = ?, anio_publ = ?, idioma = ?, resumen = ? WHERE ISBN = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "issssss", $autor_id, $editorial_nombre, $nombre, $anio_publ, $idioma, $resumen, $ISBN);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_books.php");
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