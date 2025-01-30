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
                <!-- Formulario de libros  -->
                <form action="<?= URL ?>libro/create" method="POST">

                <!-- protección CSRF -->
                <input type="hidden" name="csrf_token"
                        value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

                    <!-- titulo -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control <?= (isset($this->error['titulo']))? 'is-invalid': null ?>" 
                        id="titulo" name="titulo" placeholder="Introduzca título" value="<?= htmlspecialchars($this->libro->titulo) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['titulo'] ??= null ?>
                        </span>
                    </div>
                    <!-- Select Dinámico autores -->
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <select class="form-select <?= (isset($this->error['autor']))? 'is-invalid': null ?>" 
                        id="autor" name="autor" required>
                            <option selected disabled>Seleccione Autor</option>
                            <!-- mostrar lista autores -->
                            <?php foreach ($this->autores as $indice => $data): ?>
                                <option value="<?= $indice ?>" <?= ($this->libro->autor == $indice)? 'selected': null ?>>
                                    <?= $data ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['autor'] ??= null ?>
                        </span>
                    </div>
                    <!-- Select Dinámico editorial -->
                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial</label>
                        <select class="form-select <?= (isset($this->error['editorial']))? 'is-invalid': null ?>" 
                        id="editorial" name="editorial" required>
                            <option selected disabled>Seleccione Editorial</option>
                            <!-- mostrar lista cucrsos -->
                            <?php foreach ($this->editoriales as $indice => $data): ?>
                                <option value="<?= $indice ?>" <?= ($this->libro->editorial == $indice)? 'selected': null ?>>
                                    <?= $data ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['editorial'] ??= null ?>
                        </span>
                    </div>
                    <!-- precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control <?= (isset($this->error['precio']))? 'is-invalid': null ?>" 
                        id="precio" name="precio" step="0.01" placeholder="0.00" value="<?= htmlspecialchars($this->libro->precio) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['precio'] ??= null ?>
                        </span>
                    </div>

                    <!-- unidades -->
                    <div class="mb-3">
                        <label for="unidades" class="form-label">Unidades</label>
                        <input type="number" class="form-control <?= (isset($this->error['unidades']))? 'is-invalid': null ?>" 
                        id="unidades" name="unidades" placeholder="0" step="1" value="<?= htmlspecialchars($this->libro->unidades) ?>">
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['unidades'] ??= null ?>
                        </span>
                    </div>
                    <!-- fecha_edicion -->
                    <div class="mb-3">
                        <label for="fecha_edicion" class="form-label">Fecha Edición</label>
                        <input type="date" class="form-control <?= (isset($this->error['fecha_edicion']))? 'is-invalid': null ?>" 
                        id="fecha_edicion" name="fecha_edicion" value="<?= htmlspecialchars($this->libro->fecha_edicion) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['fecha_edicion'] ??= null ?>   
                        </span>
                    </div>
                    <!-- isbn -->
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="number" class="form-control <?= (isset($this->error['isbn']))? 'is-invalid': null ?>" 
                        id="isbn" name="isbn" placeholder="1111111111111" value="<?= htmlspecialchars($this->libro->isbn) ?>" required>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['isbn'] ??= null ?>
                        </span>
                    </div>

                    <!-- lista checbox dinámica géneros -->

                    <div class="mb-3">
                        <label for="generos_id" class="form-label">Seleccione Géneros</label>
                        <div class="form-control <?= (isset($this->error['generos_id']))? 'is-invalid': null ?>">
                            <!-- muestro el array generos -->
                            <?php foreach ($this->generos as $indice => $data): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="generos_id" name="generos_id[]" value="<?= $indice ?>">
                                    <label class="form-check-label" for="">
                                        <?= $data ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <!-- mostrar posible error -->
                        <span class="form-text text-danger" role="alert">
                            <?= $this->error['generos_id'] ??= null ?>
                        </span>
                    </div>
                    
            </div>
            <div class="card-footer">
                <!-- botones de acción -->
                <a class="btn btn-secondary" href="<?= URL ?>libro" role="button"
                onclick="return confirm('¿Estás seguro de que deseas cancelar? Se perderán los datos ingresados.')">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
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