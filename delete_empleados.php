<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Empleado</title>
</head>
<body>
    <h2>Eliminar Empleado</h2>
    <form method="post" action="delete_empleados.php">
        <label for="empleado_id">Empleado ID:</label>
        <input type="number" name="empleado_id" id="empleado_id" required><br>

        <input type="submit" value="Eliminar">
    </form>
</body>
</html>

<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the empleado_id is sent via the form
    $empleado_id = $_POST['empleado_id'];

    // Prepare and execute the SQL DELETE query
    $query = "DELETE FROM empleados WHERE empleado_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $empleado_id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_empleados.php");
        exit();
    } else {
        // Error while deleting
        echo "Error deleting employee: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
