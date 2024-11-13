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

        <legend>Tabla Alumnos</legend>

        <?php
        include 'views/partials/partial.menu.php';
        ?>

        <table class="table">
            <thead>
                <!-- Encabezado Tabla -->
                <tr>

                    <!-- Personalizado -->
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Curso</th>
                    <th>Asignatura</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($alumnos->getTabla() as $indice => $alumno): ?>
                    <tr>

                        <td>
                            <?= $alumno->getId() ?>
                        </td>
                        <td>
                            <?= $alumno->getNombre() ?>
                        </td>
                        <td>
                            <?= $alumno->getApellidos() ?>
                        </td>
                        <td>
                            <?= $alumno->getEmail() ?>
                        </td>
                        <td>
                            <?= $alumno->getEdad() ?>
                        </td>
                        <td>
                            <?= $cursos[$alumno->getCurso()] ?>
                        </td>
                        <td>
                            <?= implode(", ", ArrayAlumno::mostrarAsignatura($asignaturas, $alumno->getAsignaturas())) ?>
                        </td>

                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?indice=<?= $indice ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?indice=<?= $indice ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?indice=<?= $indice ?>" title="Mostrar">
                                <i class="bi bi-card-text"></i></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <?php
    include 'views/partials/partial.footer.php';
    ?>
    <!-- javascript bootstrap 512 -->
    <?php
    include "views/layouts/javascript.html";
    ?>
</body>

</html>