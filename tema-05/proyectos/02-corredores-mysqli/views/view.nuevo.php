<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/layout.head.html'; ?>
    <title>Nuevo Alumno - BBDD fp </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- Encabezado proyecto -->
        <?php include 'views/partials/partial.header.php'; ?>

        <legend>Formulario Nuevo Alumno</legend>

        <!-- Formulario Nuevo libro -->

        <form action="create.php" method="POST">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
            </div>
            <!-- ciudad -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad">
            </div>
            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fechaNacimineto" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento">
            </div>
            <!-- sexo -->
            <label for="ciudad" class="form-label">Sexo</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="hombre">
                <label class="form-check-label" for="sexo">Hombre</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="mujer">
                <label class="form-check-label" for="sexo">Mujer</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="sinEspecificar">
                <label class="form-check-label" for="sexo">Sin Especificar</label>
            </div>
            <!-- Email -->
            <div class="mb-3">
            <br>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <!-- Dni -->
            <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control" name="dni">
            </div>
            
            <!-- Select Dinámico categorias -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select" name="id_categoria">
                    <option selected disabled>Seleccione categoría</option>
                    <!-- mostrar lista categoria -->
                    <?php foreach ($categorias as $data): ?>
                        <option value="<?= $data['id'] ?>">
                            <?= $data['categoria'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Select Dinámico clubs -->
            <div class="mb-3">
                <label for="club" class="form-label">Club</label>
                <select class="form-select" name="id_club">
                    <option selected disabled>Seleccione club</option>
                    <!-- mostrar lista club -->
                    <?php foreach ($clubs as $data): ?>
                        <option value="<?= $data['id'] ?>">
                            <?= $data['club'] ?>
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