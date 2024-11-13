<!DOCTYPE html>
<html lang="es">

<head>

    <?php include "views/layouts/head.html" ?>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <?php include "views/partials/header.php" ?>

        <legend>Formulario Nuevo Alumno</legend>

        <form action="create.php" method="POST">

        <div class="form-floating mb-3">
                <input type="number" class="form-control" name="id">
                <label for="descripcionArticulo" class="form-label">ID:</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre">
                <label for="descripcionArticulo" class="form-label">Nombre: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="apellidos">
                <label for="modeloaArticulo" class="form-label">Apellidos: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email">
                <label for="modeloaArticulo" class="form-label">Email: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="fechaNac">
                <label for="modeloaArticulo" class="form-label">Fecha Nacimiento: </label>
            </div>

            <!-- Curso -->
            <div class="form-floating mb-3">
                <select class="form-select" aria-label="SeleccionarMarca" name="cursos">
                    <option selected disabled>Seleccione curso</option>
                    <?php foreach ($cursos as $key => $curso): ?>
                        <option value="<?= $key ?>">
                            <?= $curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="cursos" class="form-label">Curso: </label>
            </div>

            <!-- Asignaturas -->
            <div class="mb-3">
                <label for="asignaturas" class="form-label">Seleccione Asignaturas: </label>
                <?php foreach ($asignaturas as $indice => $asignatura): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="asignaturas[]">
                        <label class="form-check-label" for="">
                            <?= $asignatura ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit" class="btn btn-primary" formaction="create.php">Enviar</button>

            <button type="reset" class="btn btn-danger">Borrar</button>

            <a class="btn btn-primary" href="index.php" role="button">Volver</a>

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