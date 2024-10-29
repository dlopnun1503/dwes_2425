<!DOCTYPE html>
<html lang="es">
<head>
    <!-- cargar head.html -->
     <?php include 'views/layouts/head.html'; ?>
    <title>Artículos - Nuevo </title> 
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- cargar partial.headr.php -->
        <?php include 'views/partials/partial.header.php'; ?>
        <legend>Mostrar Artículo</legend>

      <form>
        <!-- id -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Id</label>
            <input type="text" class="form-control" value="<?= $registro['id'] ?>" disabled>
            
        </div>
        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" value="<?= $registro['descripcion'] ?>" disabled>
        </div>
        
        <!-- Modelo -->
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" value="<?= $registro['modelo'] ?>" disabled>
        </div>

        <!-- Categoria -->
        <div class="mb-3">
            <label for="modelo" class="form-label">Categoria</label>
            <input type="text" class="form-control" value="<?= $registro['categoria'] ?>" disabled>
        </div>


        <!-- Unidades -->
        <div class="mb-3">
            <label for="unidades" class="form-label">Unidades</label>
            <input type="number" class="form-control"  step="0.01" value="<?= $registro['unidades'] ?>" disabled>
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio (€)</label>
            <input type="number" class="form-control"  step="0.01" value="<?= $registro['precio'] ?>" disabled>
        </div>
        
        <!-- botones de acción -->
        <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
        
      </form>

      <br><br><br>

    <!-- Pie del documento -->
    <!-- cargar partial.footer.php -->
     <!-- cargar partial.headr.php -->
     <?php include 'views/partials/partial.footer.php'; ?>

    <!-- Bootstrap Javascript y popper -->
    <!-- cargar javascript.html -->
    <?php include 'views/layouts/javascript.html'; ?>
 
</body>
</html>