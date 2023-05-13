<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles.css">
    <title>Custom Query</title>
</head>
<body style ="height: 150vh;">
    <h2>Custom Query</h2>
    <form method="post" action="queries.php">
        <label for="query">Enter your query:</label><br>
        <textarea name="query" id="query" rows="5" cols="50" required></textarea><br>
        <input type="submit" value="Execute Query">
    </form>

    <?php
    // Assuming you have already established a database connection
    require 'db.php';

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the custom query from the form
        $query = $_POST['query'];

        // Execute the custom query
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Check if any rows are returned
            if (mysqli_num_rows($result) > 0) {
                // Display the query results in a table
                echo '<h3>Query Results:</h3>';
                echo '<table border="1">';
                echo '<tr>';
                // Fetch and display the column names
                while ($field = mysqli_fetch_field($result)) {
                    echo '<th>' . $field->name . '</th>';
                }
                echo '</tr>';

                // Fetch and display the query results
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    foreach ($row as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo 'No results found.';
            }
        } else {
            echo 'Error executing query: ' . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
<br>
<div class="text-center">
    <a href="index.php" class="back-button">Back</a>
</div>
</body>
</html>