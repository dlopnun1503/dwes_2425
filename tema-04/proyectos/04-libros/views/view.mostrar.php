<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "views/layouts/layout.head.html" ?>

</head>

<body>
    <div class="container">
        <!-- cabecera documento -->
        <?php include "views/partials/partial.header.php" ?>

        <legend>Libro seleccionado</legend>
        <form>

            <!-- id -->
            <div class="mb-3 row">
                <label for="inputid" class="col-sm-2 col-form-label">Id:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputid" name="id" value="<?= $libro->id ?>" disabled>
                </div>
            </div>

            <!-- titulo -->
            <div class="mb-3 row">
                <label for="inputtitulo" class="col-sm-2 col-form-label">Título:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputtitulo" name="titulo" value="<?= $libro->titulo ?>" disabled>
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="autor" value="<?= $libro->autor ?>" disabled>
                <label for="autorLibro" class="form-label">Autor: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="editorial" value="<?= $libro->editorial ?>" disabled>
                <label for="editorialLibro" class="form-label">Editorial: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="precio" value="<?= $libro->precio ?>" disabled>
                <label for="precioLibro" class="form-label">Fecha Edición: </label>
            </div>

            <!-- Materia -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="materia" value="<?= $materias[$libro->materia] ?>" disabled>
                <label for="materiaLibro" class="form-label">Materia: </label>
            </div>

            <!-- etiquetas -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="etiquetas" value="<?= implode(', ', $obj_tabla_libros->mostrar_nombre_etiquetas($libro->etiquetas))  ?>" disabled>
                <label for="etiquetasLibro" class="form-label">Etiquetas: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="precio" value="<?= $libro->precio ?>" disabled>
                <label for="precioLibro" class="form-label">Precio (€): </label>
            </div>

                <!-- Botones de acción -->

                <div class="btn-group" role="group">

                    <a class="btn btn-primary" href="index.php" role="button">Volver</a>

                </div>
                <br>
                <br>
                <br>


            </form>
    </div>
    <?php include 'views/partials/partial.footer.php'; ?>
    <!-- javascript bootstrap 512 -->
    <?php include "views/layouts/layout.javascript.html"; ?>
</body>

</html>