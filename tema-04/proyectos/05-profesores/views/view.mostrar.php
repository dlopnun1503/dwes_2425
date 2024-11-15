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

        <legend>Profesor seleccionado</legend>
        <form>

            <!-- id -->
            <div class="mb-3 row">
                <label for="inputid" class="col-sm-2 col-form-label">Id:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputid" name="id" value="<?= $profesor->id ?>" disabled>
                </div>
            </div>

            <!-- nombre -->
            <div class="mb-3 row">
                <label for="inputnombre" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputnombre" name="nombre" value="<?= $profesor->nombre ?>" disabled>
                </div>
            </div>

            <!-- apellidos -->
            <div class="mb-3 row">
                <label for="inputapellidos" class="col-sm-2 col-form-label">Apellidos:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputapellidos" name="apellidos" value="<?= $profesor->apellidos ?>" disabled>
                </div>
            </div>

            <!-- nrp -->
            <div class="mb-3 row">
                <label for="inputnrp" class="col-sm-2 col-form-label">nrp:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputnrp" name="apellidos" value="<?= $profesor->nrp ?>" disabled>
                </div>
            </div>

            <!-- fecha_nacimiento -->
            <div class="mb-3 row">
                <label for="inputfecha_nacimiento" class="col-sm-2 col-form-label">Fecha Nacimiento:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputfecha_nacimiento" name="apellidos" value="<?= $profesor->fecha_nacimiento ?>" disabled>
                </div>
            </div>

            <!-- poblacion -->
            <div class="mb-3 row">
                <label for="inputpoblacion" class="col-sm-2 col-form-label">Población:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputpoblacion" name="poblacion" value="<?= $profesor->poblacion ?>" disabled>
                </div>
            </div>


            <!-- especialidad -->
            <div class="mb-3 row">
                <label for="inputespecialidad" class="col-sm-2 col-form-label">Especialidad:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputespecialidad" name="especialidad" value="<?= $especialidades[$profesor->especialidad] ?>" disabled>
                </div>
            </div>

            <!-- asignaturas -->
            <div class="mb-3 row">
                <label for="inputasignaturas" class="col-sm-2 col-form-label">Asignaturas:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputasignaturas" name="asignaturas" value="<?= implode(', ', $obj_tabla_profesores->mostrar_nombre_asignaturas($profesor->asignaturas))  ?>" disabled>
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