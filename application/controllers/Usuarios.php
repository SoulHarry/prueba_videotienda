<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	/**
     * Funcion index para mostrar el login del sitio
     * 
     * 
     */
	public function index()
	{
		$this->load->view('usuarios/index');
	}
}