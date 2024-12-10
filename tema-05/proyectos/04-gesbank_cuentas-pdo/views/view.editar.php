<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/layout.head.html'; ?>
    <title>Editar Cuenta - BBDD GESBANK </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- Encabezado proyecto -->
        <?php include 'views/partials/partial.header.php'; ?>

        <legend>Formulario Edición Cuenta</legend>

        <!-- Formulario Nuevo cuenta -->

        <form action="update.php?id=<?= $id ?>" method="POST">

            <!-- num_cuenta -->
            <div class="mb-3">
                <label for="num_cuenta" class="form-label">Nº Cuenta</label>
                <input type="number" class="form-control" name="num_cuenta" value="<?= $cuenta->num_cuenta ?>">
            </div>
            <!-- Select Dinámico Clientes -->
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <select class="form-select" name="id_cliente">
                    <option selected disabled>Seleccione cliente</option>
                    <!-- mostrar lista cliente -->
                    <?php foreach ($clientes as $data): ?>
                        <!-- generar dinámicamente el parametro selected -->
                        <option value="<?= $data['id'] ?>"
                            <?= ($cuenta->cliente == $data['id']) ? 'selected' : null ?>>
                            <?= $data['cliente'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- fecha_alta -->
            <div class="mb-3">
                <label for="fecha_alta" class="form-label">Fecha Alta</label>
                <input type="text" class="form-control" name="fecha_alta" value="<?= $cuenta->fecha_alta ?>">
            </div>
            <!-- fecha_ul_mov -->
            <div class="mb-3">
                <label for="fecha_ul_mov" class="form-label">último Movimiento</label>
                <input type="text" class="form-control" name="fecha_ul_mov" value="<?= $cuenta->fecha_ul_mov ?>">
            </div>
            <!-- num_movtos -->
            <div class="mb-3">
                <label for="num_movtos" class="form-label">Nº movimientos</label>
                <input type="number" class="form-control" name="num_movtos" value="<?= $cuenta->num_movtos ?>">
            </div>

            <!-- saldo -->
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="<?= $cuenta->saldo ?>">
            </div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>

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