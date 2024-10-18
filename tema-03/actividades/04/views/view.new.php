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
        <legend>Formulario Nuevo Libro</legend>

        <!-- Formulario Nuevo Libro -->
        <form action="create.php" method="POST">

            <!-- id -->
            <div class="mb-3 row">
                <label for="inputid" class="col-sm-2 col-form-label">Id:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputid" name="id">
                </div>
            </div>
            <!-- titulo -->
            <div class="mb-3 row">
                <label for="inputtitulo" class="col-sm-2 col-form-label">Titulo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputtitulo" name="titulo">
                </div>
            </div>
            <!-- autor  -->
            <div class="mb-3 row">
                <label for="inputautor" class="col-sm-2 col-form-label">Autor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputautor" name="autor">
                </div>
            </div>
            <!-- editorial  -->
            <div class="mb-3 row">
                <label for="inputeditorial" class="col-sm-2 col-form-label">Editorial:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputeditorial" name="editorial">
                </div>
            </div>
            <!-- genero  -->
            <div class="mb-3 row">
                <label for="inputgenero" class="col-sm-2 col-form-label">Genero:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputgenero" name="genero">
                </div>
            </div>
            <!-- editorial  -->
            <div class="mb-3 row">
                <label for="inputprecio" class="col-sm-2 col-form-label">Precio:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputprecio" name="precio">
                </div>
            </div>


            <!-- botones de acción -->

            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>
        <!-- fin formulario -->


        <!-- Pie del documento -->
    <?php include 'views/partials/footer.php' ?>

</div>
<!-- javascript bootstrap 553 -->
<?php include 'views/layouts/javascript.html' ?>
</body>

</html>