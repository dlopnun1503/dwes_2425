<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2.Movimiento Circular Uniforme</title>
    <!-- css bootstrap 533 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- bootstrap icon 1.11.3-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-arrow-clockwise"></i> <!-- !!!!!!!! Depende que hagamos cambiamos el icono !!!!!!!! -->
            <span class="fs-6">2.Movimiento Circular Uniforme</span>
        </header>

        <legend>Movimiento Circular Uniforme</legend> <!-- Ponemos titulo -->

        <form method="POST">

            <!-- Radio -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Radio</span>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01" placeholder="0.00" name="radio">
            </div>
            <div class="form-text" id="basic-addon4">Radio en metros</div>
            <br>


            <!-- Frecuencia -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Frecuencia</span>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01" placeholder="0.00" name="frecuencia">
            </div>
            <div class="form-text" id="basic-addon4">Frecuencia en HZ</div>
            <br>


            <!-- Masa -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Masa</span>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01" placeholder="0.00" name="masa">
            </div>
            <div class="form-text" id="basic-addon4">Masa en Kg</div>
            <br>

            <!-- Botones de acción -->
            <div class="btn-group" role="group">
                <button type="reset" class="btn btn-secondary">Borrar</button>
                <button type="submit" class="btn btn-primary" formaction="calcular.php">Calcular</button>
            </div>


        </form>
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