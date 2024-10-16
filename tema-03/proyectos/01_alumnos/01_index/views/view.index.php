<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proyecto 3.1 - Crud Alumnos Array</title>
  <!-- css bootstrap 533 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- bootstrap icon 1.11.3-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">

    <!-- cabecera documento -->
    <header class="pb-3 mb-4 border-bottom">
      <i class="bi bi-person"></i> <!-- !!!!!!!! Depende que hagamos cambiamos el icono !!!!!!!! -->
      <span class="fs-6">Proyecto 3.1 - Crud Alumnos Array</span>
    </header>

    <div
      class="table-responsive">
      <table
        class="table table-primary">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Poblacion</th>
            <th scope="col">Curso</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($alumno as $registro): ?>

            <tr class="">
              <td><?= $registro['id'] ?></td>
              <td><?= $registro['nombre'] ?></td>
              <td><?= $registro['poblacion'] ?></td>
              <td><?= $registro['curso'] ?></td>
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