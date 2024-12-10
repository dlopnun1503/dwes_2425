<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/layout.head.html'; ?>
    <title>Nuevo Cliente - BBDD gesbank </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- Encabezado proyecto -->
        <?php include 'views/partials/partial.header.php'; ?>

        <legend>Formulario Nuevo Cliente</legend>

        <!-- Formulario Nuevo cliente -->

        <form action="create.php" method="POST">

            <!-- num_cuenta -->
            <div class="mb-3">
                <label for="num_cuenta" class="form-label">Nº Cuenta</label>
                <input type="number" class="form-control" name="num_cuenta">
            </div>
            <!-- Select Dinámico Clientes -->
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <select class="form-select" name="id_cliente">
                    <option selected disabled>Seleccione cliente</option>
                    <!-- mostrar lista cliente -->
                    <?php foreach ($clientes as $data): ?>
                        <!-- generar dinámicamente el parametro selected -->
                        <option value="<?= $data['id'] ?>">
                            <?= $data['cliente'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- fecha_alta -->
            <div class="mb-3">
                <label for="fecha_alta" class="form-label">Fecha Alta</label>
                <input type="date" class="form-control" name="fecha_alta">
            </div>
            <!-- fecha_ul_mov -->
            <div class="mb-3">
                <label for="fecha_ul_mov" class="form-label">último Movimiento</label>
                <input type="date" class="form-control" name="fecha_ul_mov">
            </div>
            <!-- num_movtos -->
            <div class="mb-3">
                <label for="num_movtos" class="form-label">Nº movimientos</label>
                <input type="number" class="form-control" name="num_movtos">
            </div>

            <!-- saldo -->
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo">
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