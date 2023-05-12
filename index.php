<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .content {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
      }

      .footer {
        background-color: #f8f9fa;
        padding: 10px;
        text-align: center;
        margin-top: 20px;
      }
    </style>
  </head>
  <body style = "height: 100vh;">
    <div class="container">
      <div class="text-center mt-5 content">
        <h1>VER, INSERTAR & MODIFICAR DATOS</h1>
        <div class="mt-4">
          <a class="btn btn-primary me-2" href="show_authors.php">Autores</a>
          <a class="btn btn-primary me-2" href="show_editorial.php">Editorial</a>
          <a class="btn btn-primary me-2" href="show_books.php">Libros</a>
          <a class="btn btn-primary me-2" href="show_empleados.php">Empleados</a>
          <a class="btn btn-primary me-2" href="show_Plus_users.php">Premium Users</a>
          <a class="btn btn-primary me-2" href="show_users.php">Usuarios</a>
          <a class="btn btn-primary me-2" href="show_ordenes.php">Ordenes</a>
        </div>
      </div>
    </div>

    <footer class="footer">
      &copy; 2023 Bryan Otero, Francisco Carrero, and Eloi Torres. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
