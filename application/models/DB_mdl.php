<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_mdl extends CI_Model {

	/**
     * Funcion index para mostrar el login del sitio
     * 
     * 
     */
	public function __constructor(){
		parent::__constructor();
    }
    

    /**
     * Funcion para consultar un usuario
     * @param Array Arreglo con la informacion necesaria para construir una consulta sql
     * 
     * @return Array Con la informacion consultada en la tabla usuarios
     */
    public function getUsuario($arrData){
        
    }

    /**
     * Funcion para actualizar la informacion de un usuario existente en la tabla usuarios
     * @param Array Arreglo con la informacion necesaria para actualizar el usuario, usando el active record de CI
     * 
     * @return Bool Con la respuesta de la ejecucion de la actualizacion en la tabla usuarios
     */
    public function updateUsuario(){

    }

    /**
     * Funcion para insertar un nuevo registro en la tabla usuarios
     * @param Array Arreglo con la informacion necesaria para insertar un usuario, usando el active record de CI
     * 
     * @return Bool Con la respuesta de la ejecucion de la actualizacion en la tabla usuarios
     */
    public function addUsuario(){
        
    }

    /**
     * 
     */
    public function deleteUsuario(){

    }
}