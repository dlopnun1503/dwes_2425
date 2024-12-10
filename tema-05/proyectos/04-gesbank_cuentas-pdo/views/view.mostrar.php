<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/layout.head.html'; ?>
    <title>Mostrar Cuenta - CRUD Cuentas </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- Encabezado proyecto -->
        <?php include 'views/partials/partial.header.php'; ?>

        <legend>Formulario Mostrar Cuenta</legend>

        <!-- Formulario Nuevo cuenta -->

        <form>

            <!-- num_cuenta -->
            <div class="mb-3">
                <label for="num_cuenta" class="form-label">Nº Cuenta</label>
                <input type="number" class="form-control" name="num_cuenta" value="<?= $cuenta->num_cuenta ?>" disabled>
            </div>
            <!-- cliente -->
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <input type="text" class="form-control" name="id_cliente" value="<?= $cuenta->cliente ?>" disabled>
            </div>
            <!-- fecha_alta -->
            <div class="mb-3">
                <label for="fecha_alta" class="form-label">Fecha Alta</label>
                <input type="text" class="form-control" name="fecha_alta" value="<?= $cuenta->fecha_alta ?>" disabled>
            </div>
            <!-- fecha_ul_mov -->
            <div class="mb-3">
                <label for="fecha_ul_mov" class="form-label">último Movimiento</label>
                <input type="text" class="form-control" name="fecha_ul_mov" value="<?= $cuenta->fecha_ul_mov ?>" disabled>
            </div>
            <!-- num_movtos -->
            <div class="mb-3">
                <label for="num_movtos" class="form-label">Nº movimientos</label>
                <input type="number" class="form-control" name="num_movtos" value="<?= $cuenta->num_movtos ?>" disabled>
            </div>

            <!-- saldo -->
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="<?= $cuenta->saldo ?>" disabled>
            </div>
            <!-- botones de acción -->
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>

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