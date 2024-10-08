    <!--
     * ejemplo 6
     * uso vistas - if alternativo
    -->

    <?php $perfil = "Admin"; ?>
    <!doctype html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ejemplo 3.6</title>
        <!-- css bootstrap 533 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- bootstrap icon 1.11.3-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>
        <div class="container">

            <!-- cabecera documento -->
            <header class="pb-3 mb-4 border-bottom">
                <span class="fs-6">Ejemplo 5 - Vista dinamica</span>
            </header>

            <!--Menu principal-->
            <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <!-- Generacion dinamica enlace admin -->
                <?php if ($perfil == "Admin"): ?>

                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                </li>
                <?php endif;?>
            </ul>
            </nav>

            <!-- Pie del documento -->
            <footer class="footer mt-auto py-3 fixed-bottom bg-ligth">
                <div class="container">
                    <span class="text-muted">© 2024 David López Núñez - DWES - 2º DAW - Curso 24/25</span>
                </div>
            </footer>

        </div>
        <!-- javascript bootstrap 553 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>