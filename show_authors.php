<?php
    require 'db.php';

    // SQL query to retrieve data from the authors table
    $sql = "SELECT * FROM autor";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["nombre"]. " - Bio: " . $row["bio"]. " - Birth: ". $row["fechaNac"]. "<br>";
        }
    } else {
        echo "0 results";
    }

$conn->close();
    ?>