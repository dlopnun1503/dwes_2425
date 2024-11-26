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
                    <input type="text" class="form-control" id="inputtitulo" name="titulo" value="<?= $libro->titulo ?>" disabled>
                </div>
            </div>

            <!-- autor -->
            <div class="mb-3 row">
                <label for="inputautor" class="col-sm-2 col-form-label">Autor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputautor" name="autor" value="<?= $libro->autor ?>" disabled>
                </div>
            </div>

            <!-- editorial -->
            <div class="mb-3 row">
                <label for="inputeditorial" class="col-sm-2 col-form-label">Editorial:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputeditorial" name="autor" value="<?= $libro->editorial ?>" disabled>
                </div>
            </div>

            <!-- fecha_edicion -->
            <div class="mb-3 row">
                <label for="inputfecha_edicion" class="col-sm-2 col-form-label">Fecha Edición:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputfecha_edicion" name="autor" value="<?= $libro->fecha_edicion ?>" disabled>
                </div>
            </div>

            <!-- Materia -->
            <div class="mb-3 row">
                <label for="inputmateria" class="col-sm-2 col-form-label">Materia:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputmateria" name="materia" value="<?= $materias[$libro->materia] ?>" disabled>
                </div>
            </div>

            <!-- etiquetas -->
            <div class="mb-3 row">
                <label for="inputetiquetas" class="col-sm-2 col-form-label">Etiquetas:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputetiquetas" name="etiquetas" value="<?= implode(', ', $obj_tabla_libros->mostrar_nombre_etiquetas($libro->etiquetas))  ?>" disabled>
                </div>
            </div>

            <!-- Precio -->
            <div class="mb-3 row">
                <label for="inputprecio" class="col-sm-2 col-form-label">Precio:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputprecio" name="precio" value="<?= number_format($libro->precio, 2, ',', '.'). '€'  ?>" disabled>
                </div>
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