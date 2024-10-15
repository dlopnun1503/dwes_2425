<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actividad 3.2 - Tema 3 PHP</title>
    <!-- css bootstrap 533 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- bootstrap icon 1.11.3-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-table"></i> <!-- !!!!!!!! Depende que hagamos cambiamos el icono !!!!!!!! -->
                <span class="fs-6">Tablas de Multiplicar</span>
        </header>
        <legend>Tablas de Multiplicar</legend>


        <table class="table">
            <tr>
                <th></th>
                <?php
                $i = 1;
                while ($i <= 10) {
                    echo "<th>$i</th>";
                    $i++;
                }
                ?>
            </tr>

            <?php
            $fila = 1;
            while ($fila <= 10): ?>
                <tr>
                    <th><strong><?php echo $fila; ?></strong></th>

                    <?php
                    $columna = 1;
                    while ($columna <= 10): ?>
                        <td><?php echo $fila * $columna; ?></td>
                        <?php $columna++; ?>
                    <?php endwhile; ?>
                </tr>
                <?php $fila++; ?>
            <?php endwhile; ?>
        </table>



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