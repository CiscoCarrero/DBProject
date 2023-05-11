<?php
    require 'db.php';

    // SQL query to retrieve data from the authors table
    $sql = "SELECT u.usuario_id AS usuario_id_plus, up.genero, up.telefono, up.nombre, up.edad, up.discount
        FROM Usuario_Plus up
        JOIN Usuario u ON u.usuario_id = up.usuario_id";
    //$result = mysqli_query($conn, $sql); 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "UsuarioID: " . $row["usuario_id"]. " - Descuento: " . $row["descuento"]. "<br>"; 
        }
    } else {
        echo "0 results";
    }

$conn->close();
    ?>