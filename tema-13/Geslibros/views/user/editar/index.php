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
                <!-- Formulario de usuarios  -->
                <form action="<?= URL ?>user/update/<?= $this->id ?>/<?= $this->csrf_token ?>" method="POST">

                    <!-- protección CSRF -->
                    <input type="hidden" name="csrf_token"
                        value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

                    <!-- id oculto -->
                    <!-- Tengo que pasar el id oculto para que el controlador pueda validar doblemente el id -->
                    <input type="number" class="form-control" name="id" value="<?= htmlspecialchars($this->user->id) ?>" hidden>

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control <?= (isset($this->error['name'])) ? 'is-invalid' : null ?>"
                            id="name" name="name" placeholder="Introduzca nombre" value="<?= htmlspecialchars($this->user->name) ?>" required>
                        <!-- Mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['name'] ??= null ?>
                        </span>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= (isset($this->error['email'])) ? 'is-invalid' : null ?>"
                            id="email" name="email" placeholder="correo@ejemplo.com" value="<?= htmlspecialchars($this->user->email) ?>" required>
                        <!-- Mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['email'] ??= null ?>
                        </span>
                    </div>

                    <!-- Rol -->
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Rol</label>
                        <select class="form-control <?= (isset($this->error['role_id'])) ? 'is-invalid' : null ?>" id="role_id" name="role_id" required>
                            <option value="">Seleccionar Rol</option>
                            <?php foreach ($this->roles as $role): ?>
                                <option value="<?= $role->id ?>" <?= ($this->user->role_id == $role->id) ? 'selected' : '' ?>><?= $role->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="form-text text-danger" role="alert"><?= $this->error['role_id'] ?? null ?></span>
                    </div>

                    


            </div>
            <div class="card-footer">
                <!-- botones de acción -->
                <a class="btn btn-secondary" href="<?= URL ?>user" role="button"
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