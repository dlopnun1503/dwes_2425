<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/layout.head.html'; ?>
    <title>Editar Alumno - BBDD fp </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- Encabezado proyecto -->
        <?php include 'views/partials/partial.header.php'; ?>

        <legend>Formulario Edición Alumno</legend>

        <!-- Formulario Nuevo libro -->

        <form action="update.php?id=<?=$id?>" method="POST">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->nombre ?>">
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->apellidos ?>">
            </div>
            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fechaNac" value="<?= $alumno->fechaNac ?>">
            </div>
            <!-- Dni -->
            <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control" name="dni" value="<?= $alumno->dni ?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $alumno->email ?>">
            </div>
            <!-- Telefono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" name="telefono" value="<?= $alumno->telefono ?>">
            </div>
            <!-- Nacionalidad -->
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" value="<?= $alumno->nacionalidad ?>">
            </div>

            <!-- Select Dinámico Cursos -->
            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select class="form-select" name="id_curso">
                    <option selected disabled>Seleccione curso</option>
                    <!-- mostrar lista cucrsos -->
                    <?php foreach ($cursos as $data): ?>
                        <!-- generar dinámicamente el parametro selected -->
                        <option value="<?= $data['id'] ?>"
                        <?= ($alumno->id_curso == $data['id'])? 'selected' :null ?>
                        >
                            <?= $data['curso'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>
        <!-- Fin formulario nuevo artículo -->
    </div>
    <br><br><br>

    <!-- Pie del documento -->
    <?php include 'views/partials/partial.footer.php'; ?>

    <!-- Bootstrap Javascript y popper -->
    <?php include 'views/layouts/layout.javascript.html'; ?>


</body>

</html>