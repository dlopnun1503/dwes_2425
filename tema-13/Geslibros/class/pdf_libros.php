<?php


class Pdf_libros extends FPDF
{
    public function Header()
    {
        // Select courier normal tamaño 9
        $this->SetFont('Courier', '', 10);

        // Imprimir logo empresa
        $this->image('images/libros.jpg', 10, 5, 20);

        // Imprimir logo empresa
        $this->image('images/libros.jpg', 180, 5, 20);

        // Celda
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Lista de Libros - 2DAW - Curso 24/25'), 'B', 1, 'C');

        // Line break
        $this->Ln(10);
    }

    public function Footer()
    {
        $this->setY(-10);
        $this->SetFont('Courier', '', 10);
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Página ') . $this->PageNo() . '/{nb}', 'T', 0, 'C');
    }

    public function titulo()
    {
        // Establecemos la fuente y el tamaño
        $this->SetFont('Courier', 'B', 10);

        // Color de fondo
        $this->SetFillColor(255, 255, 0);

        // Escribimos el título
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Listado de Libros'), 0, 1, 'C', 1);

        // Insertar imagen en modo apaisado
        $this->image('images/biblio.jpg', 25, 43, 160, 60);  // 100 es el ancho y 60 es el alto (ajustados a un formato apaisado)

        // Dejar un espacio de 2 líneas
        $this->Ln(80);
    }

    public function cabecera()
    {
        // Fondo para el encabezado
        $this->SetFillColor(0, 100, 255);

        // Establecer el tamaño de la fuente
        $this->SetFont('Courier', 'B', 8);

        // Escribimos los nombres de las columnas ajustando el tamaño de las celdas
        $this->Cell(5, 10, iconv('UTF-8', 'ISO-8859-1', '#'), 1, 0, 'C', 1);
        $this->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1', 'Título'), 1, 0, 'L', 1);  // Aumento el ancho para Título
        $this->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'Autor'), 1, 0, 'L', 1);
        $this->Cell(50, 10, iconv('UTF-8', 'ISO-8859-1', 'Editorial'), 1, 0, 'L', 1);  // Aumento el ancho para Editorial
        $this->Cell(15, 10, iconv('UTF-8', 'ISO-8859-1', 'Stock'), 1, 0, 'R', 1);
        $this->Cell(15, 10, iconv('UTF-8', 'ISO-8859-1', 'Precio'), 1, 1, 'R', 1);
    }
}
