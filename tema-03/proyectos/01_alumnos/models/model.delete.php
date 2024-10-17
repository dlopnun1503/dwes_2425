<?php 
    

    /*
    model.delete.php
    elimina un elemento de la lista
    Metodo get: 
          - id alumno que se desea eliminar   
    */


    //Cargar id
    $id = $_GET['id'];

    //Cargar la tabla
    $alumnos = get_tabla_alumnos();

    //Buscar id en la tabla y devuelvo el indice
    $indice_eliminar = buscar_tabla($alumnos, 'id', $id);

    //Validar la busqueda
    if($indice_eliminar !== false){
        
        //Eliminar alumno
        unset($alumnos[$indice_eliminar]);

    }else {
        echo "ERROR: Alumno no encontrado";
        exit();
    }

    


