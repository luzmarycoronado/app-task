<?php
require_once('conexion.php');
class Mysql extends Conexion{
    private $conexion;
    protected function __construct()
    {
       parent::__construct(); 
       $this->conexion = new Conexion();
       $this->conexion = $this->conexion->getConexion();
    }
    /*
    * Esta funcion permite realizar registros  de tipo insert en la base de datos
    */
    protected function insert($sql,array $data)
    {
       $prepared=$this->conexion->prepare($sql);
       $prepared->execute($data);
       $request=$this->conexion->lastInsertId();
       return $request;
    }
     
    /*
    * Esta funcion permite que realize consultas de tipo select en 
    la base de datos donde devolvera un solo registro
    */
    protected function select($sql,array $data)
    {
       $prepared = $this->conexion->prepare($sql);
       $prepared->execute($data);
       $request = $prepared->fetch(PDO::FETCH_ASSOC);
       return $request;
    }


    /*
    * Esta funcion permite que realize actualizar los datos  en 
    la base de datos 
    */


    protected function update($sql,array $data)
    {
       $prepared = $this->conexion->prepare($sql);
       $request = $prepared->execute($data);
       return $request;
    }

/*
    * Esta funcion permite  eliminar los datos  en 
    la base de datos
    */

    protected function delete($sql,array $data)
    {
       $prepared = $this->conexion->prepare($sql);
       $request = $prepared->execute($data);
       return $request;
    }

    protected function selectAll($sql,array $data)
    {
       $prepared = $this->conexion->prepare($sql);
       $prepared->execute($data);
       $request = $prepared->fetchAll(PDO::FETCH_ASSOC);
       return $request;
    }
  }


