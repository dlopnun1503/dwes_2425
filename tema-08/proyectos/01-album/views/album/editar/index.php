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
                <!-- Formulario de albums  -->
                <form action="<?= URL ?>album/update/<?= $this->id ?>/<?= $this->csrf_token ?>" method="POST">

                    <!-- protección CSRF -->
                    <input type="hidden" name="csrf_token"
                        value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

                    <!-- id oculto -->
                    <!-- Tengo que pasar el id oculto para que el controlador pueda validar doblemente el id -->
                    <input type="number" class="form-control" name="id" value="<?= htmlspecialchars($this->album->id) ?>" hidden>

                    <!-- titulo -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control <?= (isset($this->error['titulo'])) ? 'is-invalid' : null ?>"
                            id="titulo" name="titulo" placeholder="Introduzca título" value="<?= htmlspecialchars($this->album->titulo) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['titulo'] ??= null ?>
                        </span>
                    </div>
                    <!-- descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control <?= (isset($this->error['descripcion'])) ? 'is-invalid' : null ?>"
                            id="descripcion" name="descripcion" required><?= htmlspecialchars($this->album->descripcion) ?></textarea>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['descripcion'] ??= null ?>
                        </span>
                    </div>

                    <!-- autor -->
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control <?= (isset($this->error['autor'])) ? 'is-invalid' : null ?>"
                            id="autor" name="autor" value="<?= htmlspecialchars($this->album->autor) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['autor'] ??= null ?>
                        </span>
                    </div>

                    <!-- fecha -->
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control <?= (isset($this->error['fecha'])) ? 'is-invalid' : null ?>"
                            id="fecha" name="fecha" value="<?= htmlspecialchars($this->album->fecha) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['fecha'] ??= null ?>
                        </span>
                    </div>

                    <!-- lugar -->
                    <div class="mb-3">
                        <label for="lugar" class="form-label">Lugar</label>
                        <input type="text" class="form-control <?= (isset($this->error['lugar'])) ? 'is-invalid' : null ?>"
                            id="lugar" name="lugar" value="<?= htmlspecialchars($this->album->lugar) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['lugar'] ??= null ?>
                        </span>
                    </div>

                    <!-- Select Dinámico categorias -->
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select class="form-select <?= isset($this->error['categoria_id']) ? 'is-invalid' : '' ?>"
                            id="categoria_id" name="categoria_id" required>
                            <option selected disabled>Seleccione categoría</option>

                            <!-- Mostrar lista de categorías -->
                            <?php foreach ($this->categorias as $indice => $data): ?>
                                <option value="<?= $indice ?>"
                                    <?= isset($this->album->categoria_id) && $this->album->categoria_id == $indice ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($data) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <!-- Mostrar posibles errores -->
                        <?php if (isset($this->error['categoria_id'])): ?>
                            <span class="form-text text-danger" role="alert">
                                <?= htmlspecialchars($this->error['categoria_id']) ?>
                            </span>
                        <?php endif; ?>
                    </div>


                    <!-- etiquetas -->
                    <div class="mb-3">
                        <label for="etiquetas" class="form-label">Etiquetas</label>
                        <input type="text" class="form-control <?= (isset($this->error['etiquetas'])) ? 'is-invalid' : null ?>"
                            id="etiquetas" name="etiquetas" value="<?= htmlspecialchars($this->album->etiquetas) ?>">
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['etiquetas'] ??= null ?>
                        </span>
                    </div>


                    <!-- carpeta -->
                    <div class="mb-3">
                        <label for="carpeta" class="form-label">Carpeta</label>
                        <input type="text" class="form-control <?= (isset($this->error['carpeta'])) ? 'is-invalid' : null ?>"
                            id="carpeta" name="carpeta" value="<?= htmlspecialchars($this->album->carpeta) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['carpeta'] ??= null ?>
                        </span>
                    </div>

            </div>
            <div class="card-footer">
                <!-- botones de acción -->
                <a class="btn btn-secondary" href="<?= URL ?>album" role="button"
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