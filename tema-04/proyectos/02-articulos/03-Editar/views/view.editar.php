<!doctype html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html'; ?>
    <title>Proyecto 31 - CRUD Alumnos Array</title>
</head>

<body>
    <!-- capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <!-- Mostrar la tabla de articulos -->
        <legend>Formulario Editar Articulo</legend>

        <!-- Formulario Nuevo articulo -->
        <form action="update.php?id=<?= $articulo->getId() ?>" method="POST">
            <!-- id -->
            <div class="mb-3 row">
                <label for="inputid" class="col-sm-2 col-form-label">Id:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputid" name="id" value="<?= $articulo->getId(); ?>" readonly>
                </div>
            </div>
            <!-- descripcion -->
            <div class="mb-3 row">
                <label for="inputdescripcion" class="col-sm-2 col-form-label">Descripcion:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputdescripcion" name="descripcion" value="<?= $articulo->getDescripcion(); ?>">
                </div>
            </div>
            <!-- modelo  -->
            <div class="mb-3 row">
                <label for="inputmodelo" class="col-sm-2 col-form-label">Modelo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputmodelo" name="modelo" value="<?= $articulo->getModelo(); ?>">
                </div>
            </div>
            <!-- marca  -->
            <div class="mb-3 row">
                <label for="marca" class="form-label">Marca:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputmarca" name="marca">
                    <option selected disabled>Seleccione una</option>
                    <?php foreach ($marcas as $indice => $data): ?>
                        <option value="<?= $indice ?>" <?= ($articulo->getMarca() == $indice) ? 'selected' : null ?>>
                            <?= $data ?>
                        </option>
                    <?php endforeach ?>
                    </select>
            </div>
    </div>
    <!-- categorias  -->
    <div class="mb-3 row">
        <label for="inputcategorias" class="col-sm-2 col-form-label">Categorias:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputcategorias" name="categorias" value="<?= implode(', ', $obj_tabla_articulos->mostrar_nombre_categorias($articulo->getCategorias())); ?>">
        </div>
    </div>
    <!-- unidades  -->
    <div class="mb-3 row">
        <label for="inputunidades" class="col-sm-2 col-form-label">Unidades:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputunidades" name="unidades" value="<?= $articulo->getUnidades(); ?>">
        </div>
    </div>
    <!-- precio  -->
    <div class="mb-3 row">
        <label for="inputprecio" class="col-sm-2 col-form-label">Precio:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputprecio" name="precio" step="0.01" value="<?= $articulo->getPrecio(); ?>">
        </div>
    </div>
    <!-- botones de acción -->

    <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>

    </form>
    <!-- fin formulario -->


    <!-- Pie del documento -->
    <?php include 'views/partials/footer.php'; ?>

    </div>
    <!-- javascript bootstrap 553 -->
    <?php include 'views/layouts/javascript.html'; ?>
</body>

</html>