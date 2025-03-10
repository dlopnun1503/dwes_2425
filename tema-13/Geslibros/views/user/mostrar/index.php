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

        <!-- Estilo card de bootstrap -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= $this->title ?></h5>
            </div>
            <div class="card-body">
                <!-- Formulario de usuarios  sin edicion-->
                <form>

                    <!-- Id -->
                    <div class="mb-3">
                        <label for="id" class="form-label">Id</label>
                        <input type="number" class="form-control" value="<?= $this->user->id ?>" disabled>
                    </div>

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" value="<?= $this->user->name ?>" disabled>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?= $this->user->email ?>" disabled>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="perfil" class="form-label">Perfil</label>
                        <input type="perfil" class="form-control" value="<?= $this->user->perfil ?>" disabled>
                    </div>



            </div>
            <div class="card-footer">
                <!-- botones de acción -->
                <a class="btn btn-secondary" href="<?= URL ?>user" role="button">Volver</a>
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