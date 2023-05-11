<?php
    require 'db.php';

    // SQL query to retrieve data from the authors table
    $sql = "SELECT libros.*, autor.nombre AS autor_nombre FROM libros JOIN autor ON libros.autor_id = autor.autor_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Title: " . $row["nombre"]. " - Author: " . $row["autor_nombre"]. "<br>";
        }
    } else {
        echo "0 results";
    }

$conn->close();
    ?>