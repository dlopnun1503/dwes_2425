<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>4.2 Calculadora Básica POO</title>
  <!-- css bootstrap 533 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- bootstrap icon 1.11.3-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">

    <!-- cabecera documento -->
    <header class="pb-3 mb-4 border-bottom">
      <i class="bi bi-calculator"></i>
      <span class="fs-6">Actividad 4.2 - Calculadora Básica POO</span>
    </header>

    <!-- Formulario -->
    <legend>Calculadora Básica POO</legend> <!-- legend permite poner un titulo -->
    
    <!-- Fin del formulario -->
    <form method="GET" action="calculadora.php">
    

      <!-- Valor 1 -->
       <!-- 
      En el input text cambiamos el tipo de dato que acepta 
      el step sirve para indicar la cantidad de decimales que acepta
      plceholder para que aparezca un valor por defecto
       -->
      <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Valor 1</span>
        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01" placeholder="0.00" name="valor1">
      </div>

      <!-- Valor 2 -->
       <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Valor 2</span>
        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01" placeholder="0.00" name="valor2">
      </div>

      <!-- Botones de acción -->
       <div class="btn-group" role="group">
        <button type="reset" class="btn btn-secondary">Borrar</button>
        <button type="submit" class="btn btn-warning" name="operador" value="suma">Sumar</button>
        <button type="submit" class="btn btn-success" name="operador" value="resta">Restar</button>
        <button type="submit" class="btn btn-danger" name="operador" value="multiplicacion">Multiplicar</button>
        <button type="submit" class="btn btn-info" name="operador" value="division">Dividir</button>
        <button type="submit" class="btn btn-dark" name="operador" value="potencia">Potencia</button>
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