<!doctype html>
<html lang="es">

<head>
    <?php require_once 'template/layouts/head.layout.php'; ?>
    <title><?= $this->title ?> </title>
</head>

<body>
    <!-- Menú fijo superior -->
    <?php require_once 'template/partials/menu.auth.partial.php' ?>

    <!-- Capa Principal -->
    <div class="container">
        <br><br><br><br>

        <!-- capa de mensajes -->
        <?php require_once 'template/partials/mensaje.partial.php' ?>

        <!-- capa errores -->
        <?php require_once 'template/partials/error.partial.php' ?>

        <!-- Estilo card de bootstrap -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= htmlspecialchars($this->title) ?></h5>
            </div>
            <div class="card-body">
                <!-- Formulario de autores  -->
                <form action="<?= URL ?>autor/update/<?= $this->id ?>/<?= $this->csrf_token ?>" method="POST">

                    <!-- protección CSRF -->
                    <input type="hidden" name="csrf_token"
                        value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

                    <!-- id oculto -->
                    <!-- Tengo que pasar el id oculto para que el controlador pueda validar doblemente el id -->
                    <input type="number" class="form-control" name="id" value="<?= htmlspecialchars($this->autor->id) ?>" hidden>

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control <?= (isset($this->error['nombre'])) ? 'is-invalid' : null ?>"
                            id="nombre" name="nombre" placeholder="Introduzca nombre" value="<?= htmlspecialchars($this->autor->nombre) ?>" required>
                        <!-- Mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['nombre'] ??= null ?>
                        </span>
                    </div>

                    <!-- Nacionalidad -->
                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <input type="text" class="form-control <?= (isset($this->error['nacionalidad'])) ? 'is-invalid' : null ?>"
                            id="nacionalidad" name="nacionalidad" placeholder="Introduzca nacionalidad" value="<?= htmlspecialchars($this->autor->nacionalidad) ?>" required>
                        <!-- Mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['nacionalidad'] ??= null ?>
                        </span>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= (isset($this->error['email'])) ? 'is-invalid' : null ?>"
                            id="email" name="email" placeholder="correo@ejemplo.com" value="<?= htmlspecialchars($this->autor->email) ?>" required>
                        <!-- Mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['email'] ??= null ?>
                        </span>
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="mb-3">
                        <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control <?= (isset($this->error['fecha_nac'])) ? 'is-invalid' : null ?>"
                            id="fecha_nac" name="fecha_nac" value="<?= htmlspecialchars($this->autor->fecha_nac) ?>" required>
                        <!-- Mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['fecha_nac'] ??= null ?>
                        </span>
                    </div>

                    <!-- Fecha de Fallecimiento -->
                    <div class="mb-3">
                        <label for="fecha_def" class="form-label">Fecha de Fallecimiento</label>
                        <input type="date" class="form-control <?= (isset($this->error['fecha_def'])) ? 'is-invalid' : null ?>"
                            id="fecha_def" name="fecha_def" value="<?= htmlspecialchars($this->autor->fecha_def) ?>">
                        <!-- Mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['fecha_def'] ??= null ?>
                        </span>
                    </div>

                    <!-- Premios -->
                    <div class="mb-3">
                        <label for="premios" class="form-label">Premios</label>
                        <input type="text" class="form-control <?= (isset($this->error['premios'])) ? 'is-invalid' : null ?>"
                            id="premios" name="premios" placeholder="Introduzca premios en caso de que tenga" value="<?= htmlspecialchars($this->autor->premios) ?>">
                        <!-- Mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['premios'] ??= null ?>
                        </span>
                    </div>


            </div>
            <div class="card-footer">
                <!-- botones de acción -->
                <a class="btn btn-secondary" href="<?= URL ?>autor" role="button"
                    onclick="return confirm('¿Estás seguro de que deseas cancelar? Se perderán los datos ingresados.')">Cancelar</a>
                <button type="reset" class="btn btn-danger">Restaurar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            </form>
            <!-- Fin formulario nuevo artículo -->
        </div>
        <br><br><br>

    </div>

    <!-- /.container -->

    <?php require_once 'template/partials/footer.partial.php' ?>
    <?php require_once 'template/layouts/javascript.layout.php' ?>

</body>

</html>