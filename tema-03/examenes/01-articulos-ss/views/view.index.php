<!DOCTYPE html>
<html lang="es">
<head>
    <!-- cargar head.html -->
    <?php include 'views/layouts/head.html'; ?>
    <title>Gestión de Artículos - Home </title>
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- Encabezado proyecto -->
        <!-- cargar partial.header.php -->
        <?php include 'views/partials/partial.header.php'; ?>
                
        <!-- Menú principal -->
        <!-- cargar partial.menu.php -->
        <?php include 'views/partials/partial.menu.php'; ?>
        <div class="table-responsive">
      <table class="table table-striped table-hover border">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Modelo</th>
            <th scope="col">Categoria</th>
            <th class="text-end" scope="col">Unidades</th>
            <th class="text-end" scope="col">Precio</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($articulos as $registro): ?>
            <tr class="">
              <td><?= $registro['id'] ?></td>
              <td><?= $registro['descripcion'] ?></td>
              <td><?= $registro['modelo'] ?></td>
              <td><?= $registro['categoria'] ?></td>
              <td class="text-end"><?= $registro['unidades'] ?></td>
              <td class="text-end"><?= $registro['precio']?> €</td>

              <!-- Botones de acción -->
              <td>
                <!-- Boton eliminar -->
                <a href="eliminar.php?id=<?= $registro['id'] ?>" title="Eliminar">
                  <i class="bi bi-trash-fill"></i></a>

                <!-- Boton editar-->
                <a href="editar.php?id=<?= $registro['id'] ?>" title="Editar">
                <i class="bi bi-pencil-square"></i></a>

                <!-- Boton mostrar-->
                <a href="mostrar.php?id=<?= $registro['id'] ?>" title="Mostrar">
                <i class="bi bi-eye-fill"></i>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4">Total Articulos: <?= count($articulos) ?></td>
          </tr>
        </tfoot>
      </table>
    </div>
    </div>
    <br><br><br>

    <!-- Pie del documento -->
    <!-- cargar partial.footer.php -->
    <?php include 'views/partials/partial.footer.php'; ?>

    <!-- Bootstrap Javascript y popper -->
    <!-- cargar javascript.php -->
    <?php include 'views/layouts/javascript.html'; ?>
    
 
</body>
</html>