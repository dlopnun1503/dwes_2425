<?php

/* 
    Creamos una clase para la tabla de usuarios
    con propiedades públicas para cada columna.
*/

class classUser {

    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct(
        $id = null,
        $name = null,
        $email = null,
        $password = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    } 
}

