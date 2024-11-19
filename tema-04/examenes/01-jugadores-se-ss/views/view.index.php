<!DOCTYPE html>
<html lang="es">
<head>
    <!-- incluye head -->
     <?php include 'views/layouts/layout.head.html';?>
    <title>Gestión de jugadores - Home </title>
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- Encabezado proyecto -->
        <!-- incluye header -->
        <?php include 'views/partials/partial.header.php';?>
                
        <!-- Menú principal -->
        <!-- incluye menú principal -->
        <?php include 'views/partials/partial.menu.php';?>
       
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <!-- Mostramos el encabezado de la tabla -->
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Equipo</th>
                        <th>Nacionalidad</th>
                        <th>Posiciones</th>
                        <th class='text-end'>Edad</th>
                        <th class='text-end'>Altura</th>
                        <th class='text-end'>Peso</th>
                        <th class='text-end'>Valor</th>
                        
                        <!-- columna de acciones -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($array_jugadores as $indice => $jugador): ?>
                        <tr>
                            <!-- Detalles de jugadores -->
                            <td><?= $jugador->id ?></td>
                            <td><?= $jugador->nombre ?></td>
                            <td><?= $equipos[$jugador->equipo] ?></td>
                            <td><?= $jugador->nacionalidad ?></td>
                            <td><?= implode(', ', $obj_tabla_jugadores->mostrar_nombre_posiciones($jugador->posiciones)) ?></td>
                            <td class="text-end"><?= $jugador->edad() ?></td>
                            <td class="text-end"><?= $jugador->altura ?></td>
                            <td class="text-end"><?= $jugador->peso ?></td>
                            <td class="text-end"><?= $jugador->valor_mercado ?></td>
                            
                            
                            <!-- Columna de acciones -->
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <a href="eliminar.php?indice=<?=$indice ?>" title="Eliminar" class="btn btn-danger" onclick="return confirm('Confimar elimación del jugador')"><i class="bi bi-trash-fill"></i></a>
                                <a href="editar.php?indice=<?=$indice ?>" title="Editar" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="mostrar.php?indice=<?=$indice ?>" title="Mostrar" class="btn btn-warning"><i class="bi bi-eye-fill"></i></a>
                            </div>
                            </td>
                        </tr>
                    <?php endforeach; ?> 
                <tfoot>
                    <tr><td colspan="6">Nº Registros <?= count($array_jugadores) ?></td></tr>
                </tfoot>
            </table>
        </div>
    </div>
    <br><br><br>

    <!-- Pie del documento -->
     <!-- inclye footer -->
     <?php include 'views/partials/partial.footer.php';?>
   
    <!-- Bootstrap Javascript y popper -->
    <!-- incluye javascript -->
    <?php include 'views/layouts/layout.javascript.html';?>
    
 
</body>
</html>