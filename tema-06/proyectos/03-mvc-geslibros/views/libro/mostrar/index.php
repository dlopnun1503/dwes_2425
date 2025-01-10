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
                        <label for="autor_id" class="form-label">Autor</label>
                        <input type="text" class="form-control" value="<?= $this->autores[$this->libro->autor_id]?>" disabled>
                    </div>
                    <!-- Editorial -->
                    <div class="mb-3">
                        <label for="editorial_id" class="form-label">Editorial</label>
                        <input type="text" class="form-control" value="<?= $this->editoriales[$this->libro->editorial_id]?>" disabled>
                    </div>

                    <!-- Géneros -->
                    <div class="mb-3">
                        <label for="generos_id" class="form-label">Géneros</label>
                        <div class="form-control">
                            <?php foreach ($this->generos as $indice => $data): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="generos[]" value="<?= $indice ?>"
                                        <?= (in_array($indice, $this->libro->generos_id)) ? 'checked' : null ?> disabled>
                                    <label class="form-check-label" for="generos_id">
                                        <?= $data ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <!-- fecha_edicion -->
                    <div class="mb-3">
                        <label for="fecha_edicion" class="form-label">Fecha Edición</label>
                        <input type="date" class="form-control" value="<?= $this->libro->fecha_edicion ?>" disabled>
                    </div>

                    <!-- ISBN -->
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" value="<?= $this->libro->isbn ?>" disabled>
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