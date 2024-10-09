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
        <i class="bi bi-arrow-clockwise"></i>
            <span class="fs-6">2 - Movimiento Circular Uniforme</span>
        </header>

        <!-- Formulario -->
        <legend>Movimiento circular Uniforme</legend> <!-- legend permite poner un titulo -->

        <!-- Fin del formulario -->
        <form></form>

        <!-- Creamos una tabla -->
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row" colspan="2" >Resultados</th>
                </tr>
                <tr>
                    <td>Velocidad Tangencial:</td>
                    <td><?= $V_tangencial ?> m/s</td>
                </tr>
                <tr>
                    <td>Aceleracion Centrípeta:</td>
                    <td><?= $A_centripeta ?> m/s^2</td>
                </tr>
                <tr>
                    <td>Fuerza Centrípeta:</td>
                    <td><?= $F_centripeta ?> N </td>
                </tr>
                <tr>
                    <td>Periodo:</td>
                    <td><?= $periodo ?> seg </td>
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