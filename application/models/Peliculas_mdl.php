<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peliculas_mdl extends CI_Model {

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