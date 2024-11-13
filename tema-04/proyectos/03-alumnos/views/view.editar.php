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

        <legend>Formulario Editar Alumno</legend>

        <form action="update.php?indice=<?= $idBuscado ?>" method="POST">

        <div class="form-floating mb-3">
                <input type="number" class="form-control" name="id" value="<?= $alumno->getId()?>">
                <label for="descripcionArticulo" class="form-label">ID:</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->getNombre()?>">
                <label for="descripcionArticulo" class="form-label">Nombre: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->getApellidos() ?>">
                <label for="modeloaArticulo" class="form-label">Apellidos: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email" value="<?= $alumno->getEmail() ?>">
                <label for="modeloaArticulo" class="form-label">Email: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="fechaNac" value="<?= $alumno->getFechaNacimiento()?>">
                <label for="modeloaArticulo" class="form-label">Fecha Nacimiento: </label>
            </div>

            <!-- Curso -->
            <div class="form-floating mb-3">
                <select class="form-select" aria-label="SeleccionarMarca" name="cursos">
                    <option selected disabled>Seleccione curso</option>
                    <?php foreach ($cursos as $key => $curso): ?>
                        <option value="<?= $key ?>" <?=($alumno->getCurso() == $key)?'selected':null ?>>
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
                        <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="asignaturas[]" 
                        <?=(in_array($indice,$alumno->getAsignaturas()) ? 'checked': null)?>
                        >
                        <label class="form-check-label" for="">
                            <?= $asignatura ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        <br>
        <br>
        <br>

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