<?php 
    

    /*
    model.delete.php
    elimina un elemento de la lista
    Metodo get: 
          - id libro que se desea eliminar   
    */


    //Cargar id
    $id = $_GET['id'];

    //Cargar la tabla
    $libros = get_tabla_libros();

    //Buscar id en la tabla y devuelvo el indice
    $indice_eliminar = buscar_tabla($libros, 'id', $id);

    //Validar la busqueda
    if($indice_eliminar !== false){
        
        //Eliminar libro
        unset($libros[$indice_eliminar]);

    }else {
        echo "ERROR: Alumno no encontrado";
        exit();
    }

    


