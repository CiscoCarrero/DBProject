<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
</head>
<?php

// Assuming you have already established a database connection
require 'db.php';
// Retrieve data from the database
$query = "SELECT * FROM empleados"; // Replace 'your_table' with the actual table name
$result = mysqli_query($conn, $query);

// Create the table dynamically
echo '<table>';
echo '<tr>';
while ($field = mysqli_fetch_field($result)) {
    echo '<th>' . $field->name . '</th>';
}
echo '</tr>';

// Output the data rows
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}

echo '</table>';
?>

<div class="text-center">
    <a href="index.php" class="back-button">Back</a>
</div>

<div class="form-container">
        <div>
            <?php require 'add_empleados.php'; ?>
        </div>
        <div>
            <?php require 'update_empleados.php'; ?>
        </div>
        <div>
        <?php require 'delete_empleados.php'; ?>
        </div>
    </div>