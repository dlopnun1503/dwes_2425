<?php  
  
    
     /*
        Ejemplo 5
        uso clase libro con encapsulamiento
     */


     # Cargo la clase libro
     include 'class/class.libro.php';



     # Creo un objeto libro vacio
     $libro1 = new Class_libro();

     # Asignar valores al libro
     $libro1->setId(1);
     $libro1->setTitulo('Cien años de soledad');
     $libro1->setPrecio(10.54);
     $libro1->setPaginas(25);
     $libro1->setAutor('Gabriel García Márquez');
     $libro1->setTematica(['Novela', 'Drama', 'Romance']);

     # Mostrar detalles clase libro
     echo 'Id: '. $libro1->getId();
     echo '<br>';
     echo 'Titulo: '. $libro1->getTitulo();
     echo '<br>';
     echo 'Precio: '. $libro1->getPrecio();
     echo '<br>';
     echo 'Paginas: '. $libro1->getPaginas();
     echo '<br>';
     echo 'Autor: '. $libro1->getAutor();
     echo '<br>';
     echo 'Tematicas: '. implode(', ', $libro1->getTematica());
     echo '<br>';
     echo '<br>';
     echo '<br>';


     # Crear objeto libro con parametros
     $libro2 = new Class_libro
     (
        2,
        'La hiatoria Interminable',
        23.45,
        34,
        'Mikel Ende',
        ['Novela', 'Ficción', 'Juvenil']
     );

      # Mostrar detalles clase libro
      echo 'Id: '. $libro2->getId();
      echo '<br>';
      echo 'Titulo: '. $libro2->getTitulo();
      echo '<br>';
      echo 'Precio: '. $libro2->getPrecio();
      echo '<br>';
      echo 'Paginas: '. $libro2->getPaginas();
      echo '<br>';
      echo 'Autor: '. $libro2->getAutor();
      echo '<br>';
      echo 'Tematicas: '. implode(', ', $libro2->getTematica());
      echo '<br>';
      echo '<br>';
      echo '<br>';