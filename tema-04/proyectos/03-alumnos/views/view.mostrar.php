<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "views/layouts/head.html" ?>

</head>

<body>
    <div class="container">
        <!-- cabecera documento -->
        <?php include "views/partials/header.php" ?>

        <legend>Alumno seleccionado</legend>
        <form>

            <form action="mostrar.php">

            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="id" value="<?= $alumno->getId()?>" disabled>
                <label for="descripcionArticulo" class="form-label">ID:</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->getNombre() ?>" disabled>
                <label for="descripcionArticulo" class="form-label">Nombre: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->getApellidos() ?>" disabled>
                <label for="modeloaArticulo" class="form-label">Apellidos: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email" value="<?= $alumno->getEmail() ?>" disabled>
                <label for="modeloaArticulo" class="form-label">Email: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="fechaNac" value="<?= $alumno->getEdad() ?>" disabled>
                <label for="modeloaArticulo" class="form-label">Edad: </label>
            </div>

            <!-- Curso -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="curso" value="<?= $cursos[$alumno->getCurso()] ?>" disabled>
                <label for="modeloaArticulo" class="form-label">Curso: </label>
            </div>

            <!-- Asignaturas -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="asignaturas" value="<?= implode(", ", ArrayAlumno::mostrarAsignatura($asignaturas, $alumno->getAsignaturas())) ?>" disabled>
                <label for="modeloaArticulo" class="form-label">Asignaturas: </label>
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
    <?php
    'views/partials/footer.html';
    ?>
    <!-- javascript bootstrap 512 -->
    <?php
    include "views/layouts/javascript.html";
    ?>
</body>

</html>