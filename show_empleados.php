<?php
    require 'db.php';

    // SQL query to retrieve data from the authors table
    $sql = "SELECT * FROM empleados";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Id del empleado: " . $row["empleado_id"]. " - Edad: " . $row["edad"]. " - Posicion: " . $row["posicion"]. "- Nombre: " . $row["nombre"].  "<br>";
        }
    } else {
        echo "0 results";
    }

$conn->close();
    ?>