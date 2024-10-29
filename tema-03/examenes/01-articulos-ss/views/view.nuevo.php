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
        <legend>Formulario Nuevo Artículo</legend>

      <form action="create.php" method="POST">
        <!-- id -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Id</label>
            <input type="text" class="form-control" >
            
        </div>
        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" >
        </div>
        
        <!-- Modelo -->
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" >
        </div>

        <!-- Categoria -->
        <div class="mb-3">
            <label for="modelo" class="form-label">Categoria</label>
            <input type="text" class="form-control" >
        </div>


        <!-- Unidades -->
        <div class="mb-3">
            <label for="unidades" class="form-label">Unidades</label>
            <input type="number" class="form-control"  step="0.01" >
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio (€)</label>
            <input type="number" class="form-control"  step="0.01" >
        </div>
        
        <!-- botones de acción -->
        <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
        <button type="reset" class="btn btn-danger">Borrar</button>
        <button type="submit" class="btn btn-primary" >Enviar</button>
        
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