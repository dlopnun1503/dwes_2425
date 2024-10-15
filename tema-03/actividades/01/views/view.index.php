<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Actividad 3.1 - Tema 3 PHP</title>
  <!-- css bootstrap 533 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- bootstrap icon 1.11.3-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">

    <!-- cabecera documento -->
    <header class="pb-3 mb-4 border-bottom">
      <i class="bi bi-calculator"></i> <!-- !!!!!!!! Depende que hagamos cambiamos el icono !!!!!!!! -->
      <span class="fs-6">Tabla de Libros</span>
    </header>
    <legend>Actividad 3.1 - Tema 3 PHP</legend>

    <<div
      class="table-responsive">
      <table
        class="table table-primary">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Genero</th>
            <th scope="col">Precio</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($libro as $registro): ?>

            <tr class="">
              <td><?= $registro['Id'] ?></td>
              <td><?= $registro['Titulo'] ?></td>
              <td><?= $registro['Autor'] ?></td>
              <td><?= $registro['Genero'] ?></td>
              <td><?= $registro['Precio'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
  </div>


  <!-- Pie del documento -->
  <footer class="footer mt-auto py-3 fixed-bottom bg-ligth">
    <div class="container">
      <span class="text-muted">© 2024 David López Núñez - DWES - 2º DAW - Curso 24/25</span>
    </div>
  </footer>

  </div>
  <!-- javascript bootstrap 553 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>