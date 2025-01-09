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
                <!-- Formulario de libros  sin edicion-->
                <form>

                    <!-- id -->
                    <div class="mb-3">
                        <label for="id" class="form-label">Id</label>
                        <input type="number" class="form-control" value="<?= $this->libro->id ?>" disabled>
                    </div>

                    <!-- Título -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Título</label>
                        <input type="text" class="form-control" value="<?= $this->libro->titulo ?>" disabled>
                    </div>

                    <!-- Autor -->
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <select class="form-select" name="autor_id" disabled>
                            <!-- mostrar lista autor -->
                            <?php foreach ($this->autor as $data): ?>
                                <!-- generar dinámicamente el parametro selected -->
                                <option value="<?= $data['id'] ?>"
                                    <?= ($this->libro->autor_id == $data['id']) ? 'selected' : null ?>>
                                    <?= $data['autor'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Editorial -->
                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial</label>
                        <select class="form-select" name="editorial_id" disabled>
                            <!-- mostrar lista editorial -->
                            <?php foreach ($this->editorial as $data): ?>
                                <!-- generar dinámicamente el parametro selected -->
                                <option value="<?= $data['id'] ?>"
                                    <?= ($this->libro->editorial_id == $data['id']) ? 'selected' : null ?>>
                                    <?= $data['editorial'] ?>
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
                                    <input class="form-check-input" type="checkbox" name="generos[]" value="<?= $indice ?>">
                                    <label class="form-check-label" for="generos_id">
                                        <?= $data ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
            </div>

            <!-- stock -->
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" value="<?= $this->libro->stock ?>" disabled>
            </div>
            <!-- precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" value="<?= $this->libro->precio ?>" disabled>
            </div>

        </div>
        <div class="card-footer">
            <!-- botones de acción -->
            <a class="btn btn-secondary" href="<?= URL ?>libro" role="button">Volver</a>
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