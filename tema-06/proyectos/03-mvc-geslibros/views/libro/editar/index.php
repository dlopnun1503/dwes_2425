<!doctype html>
<html lang="es">

<head>
    <?php require_once 'template/layouts/head.layout.php'; ?>
    <title><?= $this->title ?> </title>
</head>

<body>
    <!-- Menú fijo superior -->
    <?php require_once 'template/partials/menu.partial.php' ?>

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
                <!-- Formulario de libros  -->
                <!-- Enviar al controlador update con el id del libro -->
                <form action="<?= URL ?>libro/update/<?= $this->id ?>" method="POST">

                    <!-- id oculto -->
                    <!-- Tengo que pasar el id oculto para que el controlador pueda validar doblemente el id -->
                    <input type="number" class="form-control" name="id" value="<?= $this->libro->id ?>" hidden>

                    <!-- Título -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Título</label>
                        <input type="text" class="form-control" value="<?= $this->libro->titulo ?>">
                    </div>
                    <!-- precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" value="<?= $this->libro->precio ?>">
                    </div>
                    <!-- fecha_edicion -->
                    <div class="mb-3">
                        <label for="fecha_edicion" class="form-label">Fecha Edición</label>
                        <input type="date" class="form-control" value="<?= $this->libro->fecha_edicion ?>">
                    </div>

                    <!-- ISBN -->
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" value="<?= $this->libro->isbn ?>">
                    </div>
                    <!-- stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" value="<?= $this->libro->stock ?>">
                    </div>
                    <!-- Autor -->
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <select class="form-select" name="autor_id">
                            <!-- mostrar lista autor -->
                            <?php foreach ($this->autores as $id => $data): ?>
                                <!-- generar dinámicamente el parametro selected -->
                                <option value="<?= $id ?>"
                                    <?= ($this->libro->autor_id == $id) ? 'selected' : null ?>>
                                    <?= $data ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Editorial -->
                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial</label>
                        <select class="form-select" name="editorial_id">
                            <!-- mostrar lista editorial -->
                            <?php foreach ($this->editoriales as $id => $data): ?>
                                <!-- generar dinámicamente el parametro selected -->
                                <option value="<?= $id ?>"
                                    <?= ($this->libro->editorial_id == $id) ? 'selected' : null ?>>
                                    <?= $data ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Géneros -->
                    <div class="mb-3">
                        <label for="generos_id" class="form-label">Géneros</label>
                        <div class="form-control">
                            <?php foreach ($this->generos as $indice => $data): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="generos[]" value="<?= $indice ?>"
                                        <?= (in_array($indice, $this->libro->generos_id)) ? 'checked' : null ?>>
                                    <label class="form-check-label" for="generos_id">
                                        <?= $data ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <div class="card-footer">
                        <!-- botones de acción -->
                        <a class="btn btn-secondary" href="<?= URL ?>libro" role="button">Cancelar</a>
                        <button type="reset" class="btn btn-danger">Borrar</button>
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