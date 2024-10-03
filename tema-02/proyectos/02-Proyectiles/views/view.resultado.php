<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2.2 Proyectiles</title>
    <!-- css bootstrap 533 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- bootstrap icon 1.11.3-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-rocket-fill"></i>
            <span class="fs-6">Proyecto 2.2 - Proyectiles</span>
        </header>

        <!-- Formulario -->
        <legend>Lanzamiento de Proyectiles</legend> <!-- legend permite poner un titulo -->

        <!-- Fin del formulario -->
        <form></form>

        <!-- Creamos una tabla -->
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row" colspan="2" >Valores Iniciales:</th>
                </tr>
                <tr>
                    <td>Velocidad Inicial:</td>
                    <td><?= $velocidad_inicial ?> m/s</td>
                </tr>
                <tr>
                    <td>Ángulo de Inclinación:</td>
                    <td><?= $angulo_lanzamiento ?>°</td>
                </tr>
                <tr>
                    <th scope="row" colspan="2">Resultados del lanzamiento:</th>
                </tr>
                <tr>
                    <td>Ángulo Radianes:</td>
                    <td><?= $radianes ?> Radianes</td>
                </tr>
                <tr>
                    <td>Velocida Inicial X:</td>
                    <td><?= $V_InicialX ?> m/s</td>
                </tr>
                <tr>
                    <td>Velocida Inicial Y:</td>
                    <td><?= $V_InicialY ?> m/s</td>
                </tr>
                <tr>
                    <td>Alcance máximo del proyectil:</td>
                    <td><?= $alcance_maximo ?> m</td>
                </tr>
                <tr>
                    <td>Tiempo de vuelo del proyectil:</td>
                    <td><?= $tiempo_vuelo ?> s</td>
                </tr>
                <tr>
                    <td>Altura máxima del proyectil:</td>
                    <td><?= $altura_maxima ?> m</td>
                </tr>
                
              
            </tbody>
        </table>

        <br>
        <!-- Botones de acción -->
        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
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