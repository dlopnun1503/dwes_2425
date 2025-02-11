<?php

/**
     * Ejemplo 1: crear un archivo de texto plano
     * 
     * Abrir, escibir y cerrar archivo
     */

     // Abrir el archivo de texto en modo escritura
     $archivo = fopen("archivo.txt", "a");

     if(!$archivo){
        echo "Error al abrir el archivo";
     }

     // Escribir en el archivo
     fwrite($archivo, "Hola Mundo\n");
     fwrite($archivo, "Este es un archivo de texto\n");
     fwrite($archivo, "Soy el guía php\n");

     // Cerrar el archivo
     fclose($archivo);

     // Mensaje de exito
     echo "Archivo creado";