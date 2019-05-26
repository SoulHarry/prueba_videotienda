<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('DB_mdl.php');

class Usuarios_mdl extends DB_mdl {

    var $tabla = 'usuarios';

	/**
     * Funcion index para mostrar el login del sitio
     * 
     * 
     */
	public function index(){
		$this->load->view('usuarios/index');
    }
    

    public function doLogin(){
        $usuario = $_REQUEST['usuario'];
        $password =  $_REQUEST['password'];

        $arrWhere[] = "usuario = '{$usuario}'";
        $arrWhere[] = "password = '".md5($password)."'";

        $this->getData(NULL, $arrWhere);
    
    }
}