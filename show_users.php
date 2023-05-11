<?php
    require 'db.php';

    // SQL query to retrieve data from the authors table
    $sql = "SELECT * FROM Usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "UsuarioID: " . $row["usuario_id"]. " - Genero: " . $row["genero"]. " - Telefono: " . $row["telefono"]. "- Nombre: " . $row["nombre"]. "- Edad: " . $row["edad"].  "<br>";
        }
    } else {
        echo "0 results";
    }

$conn->close();
    ?>