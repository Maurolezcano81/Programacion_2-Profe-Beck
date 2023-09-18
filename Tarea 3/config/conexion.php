<?php

class conexion{
    private $_con;
    private $username;
    private $host;
    private $password;
    private $dbname;
    private $port;

    /* constructor de la base de datos*/ 
    public function __construc($query)
    {
        $this->username = 'root';
        $this->host = 'localhost';
        $this->password = '';
        $this->dbname = 'usuarios';
        $this->port = 3306;
    }



    /* funcion para conectarse a la base de datos*/
    public function conectar(){
        $this->_con = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);
    }

    /* funcion para desconectarse de la base de datos*/
    public function desconectar(){
        $this->_con->close();
    }

    /* funcion para consultar a la base de datos*/
    public function consultar($query){
        $this->conectar();
        $resultado = $this->_con->query($query);
        $this->desconectar();
        return $resultado;
    }

    /* funcion para insertar a la base de datos*/
    public function insertar($query){
        $this->conectar();
        $resultado = $this->_con->query($query);
        $id = $this->_con->insert_id;
        $this->desconectar();
        return $id;
    }

}



?>