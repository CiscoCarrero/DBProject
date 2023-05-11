<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
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