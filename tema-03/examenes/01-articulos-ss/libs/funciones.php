<?php




/*
        Genera una tabla

            - Salida. Devuelve array con la tabla generada
    */

function generar_tabla()
{

    $tabla = [

        [
            'id' => 1,
            'descripcion' => 'Portátil HP MD12345',
            'modelo' => 'HP 15-1234-20',
            'categoria' => 'Portátiles',
            'unidades' => 12,
            'precio' => 550.50
        ],
        [
            'id' => 2,
            'descripcion' => 'Tablet - Samsung Galaxy Tab A (2019)',
            'modelo' => 'Exynos',
            'categoria' => 'Tablets',
            'unidades' => 200,
            'precio' => 300.00
        ],
        [
            'id' => 3,
            'descripcion' => 'Impresora Multifunción - HP',
            'modelo' => 'DeskJet 3762',
            'categoria' => 'Dispositivo Salida',
            'unidades' => 2000,
            'precio' => 69.99
        ],
        [
            'id' => 4,
            'descripcion' => 'TV Led 40" - Thomson 40FE5606 - Full HD',
            'modelo' => 'Thomson 40FE5606',
            'categoria' => 'Televisión',
            'unidades' => 300,
            'precio' => 259.00
        ],
        [
            'id' => 5,
            'descripcion' => 'PC Sobremesa - Acer Aspire XC-830',
            'modelo' => 'Acer Aspire XC-830',
            'categoria' => 'PC',
            'unidades' => 20,
            'precio' => 329.00
        ]
    ];
    return $tabla;
}

/*
        Function: buscar_registro()
    */
function buscar_registro($tabla, $columna, $valor)
{
    $columna_id = array_column($tabla, $columna);
    $indice = array_search($valor, $columna_id, false);
    return $indice;
}

/*
    Function: nuevo()
    descripcion: Añade un nuevo elemento a la tabla
    Entrada:
            - tabla (array)
            - nuevo registro de la tabla (array indexado)
    Salida:
            - tabla actualizada
    */


   // ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡ESTÁ HECHO EN EL MODEL CREATE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*
function nuevo($tabla, $registro) 
{
}
*/



/*
    Function: update()
    descripcion: Actualiza los datos de un libro
    Entrada:
            - tabla (array)
            - registro
            - indice
    Salida:
            - tabla actualizada
    */
function update($tabla, $registro, $indice) {
    $id = $_GET['id'];

    $articulos = generar_tabla();

    $indice_act = buscar_registro($articulos, 'id', $id);

    if($indice_act === false){
        echo "ERROR: Artículo no encontrado";
        exit();
    }else {
        $registro = $articulos[$indice_act];
    }
}
