<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
</head>
<?php
// Assuming you have already established a database connection
require 'db.php';
// Retrieve data from the database
$query = "SELECT * FROM autor"; // Replace 'your_table' with the actual table name
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

<!-- add autor -->
<?php 
require 'add_authors.php';
?>