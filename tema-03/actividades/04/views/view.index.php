<!doctype html>
<html lang="es">

<head>
  <?php include 'views/layouts/head.html' ?>
  <title>Actividad 3.4 - CRUD Libros Array</title>
</head>

<body>
  <!-- capa principal -->
  <div class="container">

    <!-- cabecera documento -->
    <?php include 'views/partials/header.php' ?>

    <!-- Mostrar la tabla de libros -->
    <legend>Tabla de Libros</legend>

    <?php include 'views/partials/m_libros.php' ?>

    <div class="table-responsive">
      <table class="table table-striped table-hover border">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Editorial</th>
            <th scope="col">Genero</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($libros as $libro): ?>
            <tr class="">
              <td><?= $libro['id'] ?></td>
              <td><?= $libro['titulo'] ?></td>
              <td><?= $libro['autor'] ?></td>
              <td><?= $libro['editorial'] ?></td>
              <td><?= $libro['genero'] ?></td>
              <td><?= $libro['precio'] ?></td>

              <!-- Botones de acción -->
              <td>
                <a href="delete.php?id=<?= $libro['id'] ?>" title="Eliminar" onclick="return confirm('Comprobar eliminacion del alumno')">
                  <i class="bi bi-trash-fill"></i>
                  <i class="bi bi-pencil-square"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4">Total Libros: <?= count($libros) ?></td>
          </tr>
        </tfoot>
      </table>
    </div>


    <!-- Pie del documento -->
    <?php include 'views/partials/footer.php' ?>

  </div>
  <!-- javascript bootstrap 553 -->
  <?php include 'views/layouts/javascript.html' ?>
</body>


</html>