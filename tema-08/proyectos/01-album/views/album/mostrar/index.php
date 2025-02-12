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

        <!-- Estilo card de bootstrap -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= $this->title ?></h5>
            </div>
            <div class="card-body">
                <!-- Formulario de albums  sin edicion-->
                <form>

                    <!-- id -->
                    <div class="mb-3">
                        <label for="id" class="form-label">Id</label>
                        <input type="number" class="form-control" value="<?= $this->album->id ?>" disabled>
                    </div>

                    <!-- titulo -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" value="<?= $this->album->titulo ?>" disabled>
                    </div>

                    <!-- descripcion -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" value="<?= $this->album->descripcion ?>" disabled>
                    </div>

                    <!-- autor -->
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" value="<?= $this->album->autor ?>" disabled>
                    </div>

                    <!-- fecha -->
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" value="<?= $this->album->fecha ?>" disabled>
                    </div>

                    <!-- lugar -->
                    <div class="mb-3">
                        <label for="lugar" class="form-label">Lugar</label>
                        <input type="text" class="form-control" value="<?= $this->album->lugar ?>" disabled>
                    </div>

                    <!-- categoria -->
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control" value="<?= $this->album->categoria ?>" disabled>
                    </div>

                    <!-- etiquetas -->
                    <div class="mb-3">
                        <label for="etiquetas" class="form-label">Etiquetas</label>
                        <input type="text" class="form-control" value="<?= $this->album->etiquetas ?>" disabled>
                    </div>

                    <!-- num_fotos -->
                    <div class="mb-3">
                        <label for="num_fotos" class="form-label">Número de fotos</label>
                        <input type="number" class="form-control" value="<?= $this->album->num_fotos ?>" disabled>
                    </div>

                    <!-- num_visitas -->
                    <div class="mb-3">
                        <label for="num_visitas" class="form-label">Número de visitas</label>
                        <input type="number" class="form-control" value="<?= $this->album->num_visitas ?>" disabled>
                    </div>

                    <!-- carpeta -->
                    <div class="mb-3">
                        <label for="carpeta" class="form-label">Carpeta</label>
                        <input type="text" class="form-control" value="<?= $this->album->carpeta ?>" disabled>
                    </div>
                    
                    <!-- Sección para visualizar imágenes del álbum -->
        <br>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Imágenes del Álbum</h5>
            </div>
            <div class="card-body">
                <!-- Aquí mostramos las imágenes de la carpeta -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    <?php 
                    // Recorrer el array de imágenes que el controlador pase en $this->imagenes
                    // Cada imagen se muestra en una columna Bootstrap
                    if (!empty($this->images)) {
                        foreach ($this->images as $img) { 
                            ?>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="<?= URL . 'images/' . htmlspecialchars($this->album->carpeta) . '/' . rawurlencode($img) ?>" 
                                         class="card-img-top" 
                                         alt="Imagen del álbum <?= htmlspecialchars($this->album->titulo) ?>">
                                    <div class="card-body">
                                        <p class="card-text text-center">
                                            <?= htmlspecialchars($img) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No se encontraron imágenes en la carpeta <strong>"
                             . htmlspecialchars($this->album->carpeta)
                             . "</strong></p>";
                    }
                    ?>
                </div>
            </div>
        </div>

            </div>
            <div class="card-footer">
                <!-- botones de acción -->
                <a class="btn btn-secondary" href="<?= URL ?>album" role="button">Volver</a>
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