<?php

/*
    clase: class.tabla_php
    descripcion: define la clase que va a contener el array de objetos de la clase 
*/

class Class_tabla_cuentas extends Class_conexion
{


    /*
        método: getcuentas()
        descripcion: devuelve un objeto pdostatement con los detalles de los cuentas
    */

    public function getCuentas()
    {
        try {

            // sentencia sql
            $sql = "
            SELECT 
                cuentas.id,
                cuentas.num_cuenta,
                CONCAT_WS(', ', clientes.apellidos, clientes.nombre) as cliente,
                cuentas.fecha_alta,
                cuentas.fecha_ul_mov,
                cuentas.num_movtos,
                cuentas.saldo
            FROM
                cuentas
                    INNER JOIN
                clientes ON cuentas.id_cliente = clientes.id
            GROUP BY id
            ORDER BY id;
        ";

            // sentencia preparada
            // obtengo objeto clase pdostatement
            $stmt = $this->pdo->prepare($sql);

            // establezco tipo de fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // ejectuto
            $stmt->execute();

            // devuelvo objeto clase pdostatement
            return $stmt;
        } catch (PDOException $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero pdostatement
            $stmt = null;

            // cierro conexión
            $this->pdo = null;

            // cancelo ejecución programa
            exit();
        }
    }


    /*
        método: create()
        descripcion: permite añadir un objeto de la clase cuenta a la tabla
        
        parámetros:

            - $cuenta - objeto de la clase cuenta

    */
    public function create(Class_cuenta $cuenta)
    {
        try {

            // Crear la sentencia preparada
            $sql = "
        INSERT INTO 
            cuentas( 
                    num_cuenta,
                    id_cliente,
                    fecha_alta,
                    fecha_ul_mov,
                    num_movtos, 
                    saldo
                   )
        VALUES    (
                    :num_cuenta,
                    :id_cliente,
                    :fecha_alta,
                    :fecha_ul_mov,
                    :num_movtos, 
                    :saldo
                  )                            
        ";

            // ejecuto la sentenecia preprada
            $stmt = $this->pdo->prepare($sql);

            // vinculación de parámetros
            $stmt->bindParam(':num_cuenta', $cuenta->num_cuenta, PDO::PARAM_STR, 45);
            $stmt->bindParam(':id_cliente', $cuenta->id_cliente, PDO::PARAM_STR, 20);
            $stmt->bindParam(':fecha_alta', $cuenta->fecha_alta, PDO::PARAM_STR, 9);
            $stmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov, PDO::PARAM_STR, 20);
            $stmt->bindParam(':num_movtos', $cuenta->num_movtos, PDO::PARAM_STR, 9);
            $stmt->bindParam(':saldo', $cuenta->saldo, PDO::PARAM_STR, 45);

            // ejecutamos
            $stmt->execute();
        } catch (PDOException $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero sentencia preprada
            $stmt = null;

            // cierro conexión
            $this->pdo = null;

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: read()
        descripcion: permite obtener el objeto de la clase cuenta a partir del id del cuenta 

        parámetros:

            - $id - id del cuenta
    */
    public function read($id)
    {
        try {

            // Crear la sentencia sql
            $sql = "SELECT 
                        cuentas.id, num_cuenta, CONCAT_WS(', ', clientes.apellidos, clientes.nombre) as cliente, fecha_alta, fecha_ul_mov, num_movtos, saldo
             FROM cuentas INNER JOIN
                clientes ON cuentas.id_cliente = clientes.id WHERE cuentas.id = :id LIMIT 1";

            // Creo la sentencia preprada objeto clase pdostmt
            $stmt = $this->pdo->prepare($sql);

            // vinculación de parámetros
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Establecemos el tipo de fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $stmt->execute();

            // Devolvemos un objeto de la clase cuenta
            return $stmt->fetch();
        } catch (PDOException $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero sentencia preprada
            $stmt = null;

            // cierro conexión
            $this->pdo = null;

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: update()
        descripcion: permite actualizar los detalles de un libro en la tabla

        parámetros:

            - $cuenta - objeto de Class_cuenta
            - $id - id del cuenta
    */
    public function update(Class_cuenta $cuenta, $id)
    {
        try {

            // Crear la sentencia preparada
            $sql = "
            UPDATE cuentas SET 
                    num_cuenta = :num_cuenta,
                    id_cliente = :id_cliente,
                    fecha_alta = :fecha_alta,
                    fecha_ul_mov = :fecha_ul_mov,
                    num_movtos = :num_movtos,
                    saldo = :saldo,
                    update_at = CURRENT_TIMESTAMP
            WHERE 
                    id = :id
            LIMIT 1                            
            ";

            // ejecuto la sentenecia preprada
            $stmt = $this->pdo->prepare($sql);

            // vinculación de parámetros
            $stmt->bindParam(':num_cuenta', $cuenta->num_cuenta, PDO::PARAM_STR, 45);
            $stmt->bindParam(':id_cliente', $cuenta->id_cliente, PDO::PARAM_STR, 20);
            $stmt->bindParam(':fecha_alta', $cuenta->fecha_alta, PDO::PARAM_STR, 9);
            $stmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov, PDO::PARAM_STR, 20);
            $stmt->bindParam(':num_movtos', $cuenta->num_movtos, PDO::PARAM_STR, 9);
            $stmt->bindParam(':saldo', $cuenta->saldo, PDO::PARAM_STR, 45);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // ejecutamos
            $stmt->execute();
        } catch (PDOException $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero result
            $stmt = null;

            // cierro conexión
            $this->pdo = null;

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: order()
        descripcion: devuelve un objeto de la clase mysqli_result con los 
        detalles de los cuentas  ordenados por un criterio.

        Parámetros:

            - criterio: posición de la columna en la tabla cuentas
                        por la que quiero ordenar
    */

    public function order(int $criterio)
    {
        try {

            // sentencia sql
            $sql = " 
            SELECT 
                cuentas.id,
                cuentas.num_cuenta,
                CONCAT_WS(', ', clientes.apellidos, clientes.nombre) as cliente,
                cuentas.fecha_alta,
                cuentas.fecha_ul_mov,
                cuentas.num_movtos,
                cuentas.saldo
            FROM
                cuentas
                    INNER JOIN
                clientes ON cuentas.id_cliente = clientes.id
            GROUP BY cuentas.id
            ORDER BY :criterio;
        ";


            // ejecuto prepare
            $stmt = $this->pdo->prepare($sql);

            // vincular parámetros
            $stmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            // Tipo de fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $stmt->execute();

            // Devolvemos stmt
            return $stmt;
        } catch (PDOException $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero stmt
            $stmt = null;

            // cierro conexión
            $this->pdo = null;

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: filter()
        descripcion: devuelve un objeto de la clase mysqli_result con los 
        detalles de los cuentas  ordenados por un criterio.

        Parámetros:

            - criterio: posición de la columna en la tabla cuentas
                        por la que quiero ordenar
    */

    public function filter($expresion)
    {
        try {

            // sentencia sql
            $sql = "
            SELECT 
                cuentas.id,
                cuentas.num_cuenta,
                CONCAT_WS(', ', clientes.apellidos, clientes.nombre) as cliente,
                cuentas.fecha_alta,
                cuentas.fecha_ul_mov,
                cuentas.num_movtos,
                cuentas.saldo
            FROM
                cuentas
                    INNER JOIN
                clientes ON cuentas.id_cliente = clientes.id
            WHERE
            CONCAT_WS(' ',
                        cuentas.id,
                        cuentas.num_cuenta,
                        CONCAT_WS(', ', clientes.apellidos, clientes.nombre),
                        cuentas.fecha_alta,
                        cuentas.fecha_ul_mov,
                        cuentas.num_movtos,
                        cuentas.saldo
                    ) 
            LIKE :expresion
            GROUP BY cuentas.id
            ORDER BY cuentas.id
        ";

            // ejecuto prepare
            $stmt = $this->pdo->prepare($sql);

            // arreglamos expresión para operador like
            $expresion = '%' . $expresion . '%';

            // vincular parámetros
            $stmt->bindParam(':expresion', $expresion, PDO::PARAM_STR, 255);

            // Tipo de fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $stmt->execute();

            // Devolvemos stmt
            return $stmt;
        } catch (PDOException $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero stmt
            $stmt = null;

            // cierro conexión
            $this->pdo = null;

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: delete()
        descripcion: devuelve un objeto de la clase mysqli_result con los 
        detalles de los cuentas  ordenados por un criterio.

        Parámetros:

            - criterio: posición de la columna en la tabla cuentas
                        por la que quiero ordenar
    */

    public function delete(int $id)
    {
        try {

            // sentencia sql
            $sql = "DELETE FROM cuentas WHERE id = :id LIMIT 1";

            // ejecuto prepare
            $stmt = $this->pdo->prepare($sql);

            // vincular parámetros
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            /// Establecemos el tipo de fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $stmt->execute();

            // Devolvemos un objeto de la clase cuenta
            return $stmt;
        } catch (PDOException $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero stmt
            $stmt = null;

            // cierro conexión
            $this->pdo = null;

            // cancelo ejecución programa
            exit();
        }
    }

    public function getClientes()
    {

        try {
            $sql = "
            SELECT 
                    id, 
                    CONCAT_WS(', ', clientes.apellidos, clientes.nombre) as cliente
            FROM 
                    clientes
            ORDER BY
                    id ASC
        ";

            // obtengo objeto clase pdostatement
            $stmt = $this->pdo->prepare($sql);

            // ejectuto
            $stmt->execute();

            // devuelvo objeto clase pdostatement
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero pdostatement
            $stmt = null;

            // cierro conexión
            $this->pdo = null;

            // cancelo ejecución programa
            exit();
        }
    }
}
