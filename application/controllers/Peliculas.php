<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peliculas extends CI_Controller {

	/**
     * Funcion index para mostrar el login del sitio
     * 
     * 
     */
	public function index()
	{
		$this->load->view('peliculas/index');
	}
}
