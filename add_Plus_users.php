<!DOCTYPE html>
<html>
<center>
<head>
    <title>Add User Plus</title>
</head>
<body>
    <h2>Add User Plus</h2>
    <form method="post" action="add_users_plus.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="discount">Discount: $</label>
    <input type="number" name="discount" id="discount" step="0.01"><br>
    <input type="submit" value="Add">
</form>
</body>
</center>
</html>
<?php
// Assuming you have already established a database connection
require 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $discount = $_POST['discount'];

    // Prepare and execute the SQL INSERT statement
    $query = "INSERT INTO usuario_plus (username, discount) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sd", $username, $discount);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: show_users_plus.php");
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