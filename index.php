<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <style>
      body {
          background-image: url("Imagenes/Book\ Store.jpg");
          background-repeat: no-repeat;
          background-size: cover;
        }
    </style>
    <center>
    <h1>Autores</h1>
    <br>
    <?php
    require 'show_authors.php';
    ?>
    <br>
    <h1>Books</h1>
    <br>
    <?php
    require 'show_books.php';
    ?>
    <br>
    <h1>Usuarios</h1>
    <br>
    <?php
    require 'show_users.php';
    ?>
    <br>
    <h1>Empleados</h1>
    <?php
    require 'show_empleados.php';
    ?>
    </center>
    <br>
  </body>
</html>