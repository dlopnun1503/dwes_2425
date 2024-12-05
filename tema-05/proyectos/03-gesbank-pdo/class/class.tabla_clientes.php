<?php

/*
    clase: class.tabla_php
    descripcion: define la clase que va a contener el array de objetos de la clase 
*/

class Class_tabla_clientes extends Class_conexion
{


    /*
        método: getClientes()
        descripcion: devuelve un objeto pdostatement con los detalles de los clientes
    */

    public function getClientes()
    {
        try {

            // sentencia sql
            $sql = "
            SELECT 
                clientes.id,
                CONCAT_WS(', ', clientes.apellidos, clientes.nombre) as cliente,
                clientes.telefono,
                clientes.ciudad,
                clientes.dni,
                clientes.email,
                SUM(cuentas.saldo) saldo
            FROM
                clientes
                    LEFT JOIN
                cuentas ON cuentas.id_cliente = clientes.id
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
        descripcion: permite añadir un objeto de la clase cliente a la tabla
        
        parámetros:

            - $cliente - objeto de la clase cliente

    */
    public function create(Class_cliente $cliente)
    {
        try {

            // Crear la sentencia preparada
            $sql = "
        INSERT INTO 
            clientes( 
                    apellidos,
                    nombre,
                    telefono,
                    ciudad,
                    dni, 
                    email
                   )
        VALUES    (
                    :apellidos,
                    :nombre,
                    :telefono,
                    :ciudad,
                    :dni, 
                    :email
                  )                            
        ";

            // ejecuto la sentenecia preprada
            $stmt = $this->pdo->prepare($sql);

            // vinculación de parámetros
            $stmt->bindParam(':apellidos', $cliente->apellidos, PDO::PARAM_STR, 45);
            $stmt->bindParam(':nombre', $cliente->nombre, PDO::PARAM_STR, 20);
            $stmt->bindParam(':telefono', $cliente->telefono, PDO::PARAM_STR, 9);
            $stmt->bindParam(':ciudad', $cliente->ciudad, PDO::PARAM_STR, 20);
            $stmt->bindParam(':dni', $cliente->dni, PDO::PARAM_STR, 9);
            $stmt->bindParam(':email', $cliente->email, PDO::PARAM_STR, 45);

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
        descripcion: permite obtener el objeto de la clase cliente a partir del id del cliente 

        parámetros:

            - $id - id del cliente
    */
    public function read($id)
    {
        try {

            // Crear la sentencia sql
            $sql = "SELECT 
                         id, apellidos, nombre, telefono, ciudad, dni, email
             FROM clientes WHERE id = :id LIMIT 1";

            // Creo la sentencia preprada objeto clase pdostmt
            $stmt = $this->pdo->prepare($sql);

            // vinculación de parámetros
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Establecemos el tipo de fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $stmt->execute();

            // Devolvemos un objeto de la clase cliente
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

            - $cliente - objeto de Class_cliente
            - $id - id del cliente
    */
    public function update(Class_cliente $cliente, $id)
    {
        try {

            // Crear la sentencia preparada
            $sql = "
            UPDATE clientes SET 
                    apellidos = :apellidos,
                    nombre = :nombre,
                    telefono = :telefono,
                    ciudad = :ciudad,
                    dni = :dni,
                    email = :email,
                    update_at = CURRENT_TIMESTAMP
            WHERE 
                    id = :id
            LIMIT 1                            
            ";

            // ejecuto la sentenecia preprada
            $stmt = $this->pdo->prepare($sql);

            // vinculación de parámetros
            $stmt->bindParam(':apellidos', $cliente->apellidos, PDO::PARAM_STR, 45);
            $stmt->bindParam(':nombre', $cliente->nombre, PDO::PARAM_STR, 20);
            $stmt->bindParam(':telefono', $cliente->telefono, PDO::PARAM_STR, 9);
            $stmt->bindParam(':ciudad', $cliente->ciudad, PDO::PARAM_STR, 20);
            $stmt->bindParam(':dni', $cliente->dni, PDO::PARAM_STR, 9);
            $stmt->bindParam(':email', $cliente->email, PDO::PARAM_STR, 45);
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
        detalles de los clientes  ordenados por un criterio.

        Parámetros:

            - criterio: posición de la columna en la tabla clientes
                        por la que quiero ordenar
    */

    public function order(int $criterio)
    {
        try {

            // sentencia sql
            $sql = " 
            SELECT 
                clientes.id,
                CONCAT_WS(', ', clientes.apellidos, clientes.nombre) as cliente,
                clientes.telefono,
                clientes.ciudad,
                clientes.dni,
                clientes.email,
                SUM(cuentas.saldo) saldo
            FROM
                clientes
                    LEFT JOIN
                cuentas ON cuentas.id_cliente = clientes.id
            GROUP BY clientes.id
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
        detalles de los clientes  ordenados por un criterio.

        Parámetros:

            - criterio: posición de la columna en la tabla clientes
                        por la que quiero ordenar
    */

    public function filter($expresion)
    {
        try {

            // sentencia sql
            $sql = "
            SELECT 
                clientes.id,
                CONCAT_WS(', ', clientes.apellidos, clientes.nombre) as cliente,
                clientes.telefono,
                clientes.ciudad,
                clientes.dni,
                clientes.email,
                SUM(cuentas.saldo) saldo
            FROM
                clientes
                    LEFT JOIN
                cuentas ON cuentas.id_cliente = clientes.id
            WHERE
            CONCAT_WS(' ',
                        clientes.id,
                        CONCAT_WS(', ', clientes.apellidos, clientes.nombre),
                        clientes.telefono,
                        clientes.ciudad,
                        clientes.dni,
                        clientes.email,
                        saldo
                    ) 
            LIKE :expresion
            GROUP BY clientes.id
            ORDER BY clientes.id
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
        detalles de los clientes  ordenados por un criterio.

        Parámetros:

            - criterio: posición de la columna en la tabla clientes
                        por la que quiero ordenar
    */

    public function delete(int $id)
    {
        try {

            // sentencia sql
            $sql = "DELETE FROM clientes WHERE id = :id LIMIT 1";

            // ejecuto prepare
            $stmt = $this->pdo->prepare($sql);

            // vincular parámetros
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            /// Establecemos el tipo de fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $stmt->execute();

            // Devolvemos un objeto de la clase cliente
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
}
