<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2.1.5</title>
</head>
<body>
<div class="container">
    <!--Muestro el titulo-->
    <h1><?= $titulo; ?></h1>
    <!--Muestro la tabla-->
    <table class="table table-striped">
    <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $campo => $valor): ?>
                <tr>
                    <td><?= $campo; ?></td>
                    <td><?= $valor; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>