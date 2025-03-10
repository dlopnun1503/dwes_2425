<!doctype html>
<html lang="es">

<head>
    <?php require_once 'template/layouts/head.layout.php'; ?>
    <title>Autores - Gestión Gesautores </title>
</head>

<body>
    <!-- Menú fijo superior -->
    <?php require_once 'template/partials/menu.auth.partial.php' ?>

    <!-- Capa Principal -->
    <div class="container">
        <br><br><br><br>

        <!-- capa de errores -->
        <?php require_once 'template/partials/error.partial.php' ?>

        <!-- capa de mensajes -->
        <?php require_once 'template/partials/mensaje.partial.php' ?>

        <!-- Estilo card de bootstrap -->
        <div class="card">
            <div class="card-header">
            <h5 class="card-title"><?= $this->title ?></h5>
            </div>
            <div class="card-body">
                <!-- detalles de usuarios  -->

                <!-- Menú principal panel de usuarios  -->
                <?php include 'views/user/partials/menu.user.partial.php'; ?>

                <!-- tabla de autores -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <!-- Mostramos el encabezado de la tabla -->
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <!-- columna de acciones -->
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mostramos cuerpo de la tabla -->
                            <?php foreach ($this->users as $user): ?>
                                <tr class="align-middle">
                                    <!-- Detalles de artículos -->
                                    <td><?= $user->id ?></td>
                                    <td><?= $user->name ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->perfil ?></td>

                                    <!-- Columna de acciones -->
                                    <td>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <a href="<?= URL ?>user/eliminar/<?= $user->id ?>/<?= $_SESSION["csrf_token"] ?>" title="Eliminar"
                                                class="btn btn-danger
                                                <?= in_array($_SESSION['role_id'], $GLOBALS['user']['eliminar'])? null:'disabled'?>"
                                                onclick="return confirm('Confimar elimación del usuario')"><i
                                                    class="bi bi-trash-fill"></i></a>
                                            <a href="<?= URL ?>user/editar/<?= $user->id ?>/<?= $_SESSION["csrf_token"] ?>" title="Editar"
                                                class="btn btn-primary
                                                <?= in_array($_SESSION['role_id'], $GLOBALS['user']['editar'])? null:'disabled'?>"><i class="bi bi-pencil-square"></i></a>
                                            <a href="<?= URL ?>user/mostrar/<?= $user->id ?>/<?= $_SESSION["csrf_token"] ?>" title="Mostrar"
                                                class="btn btn-warning
                                                <?= in_array($_SESSION['role_id'], $GLOBALS['user']['mostrar'])? null:'disabled'?>"><i class="bi bi-eye-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        
                    </table>
                    
                </div>
            </div>
            <div class="card-footer">
            Nº usuarios <?= $this->users->rowCount() ?>
            </div>
        </div>
        <br><br><br>

    </div>

    <!-- /.container -->

    <?php require_once 'template/partials/footer.partial.php' ?>
    <?php require_once 'template/layouts/javascript.layout.php' ?>

</body>

</html>