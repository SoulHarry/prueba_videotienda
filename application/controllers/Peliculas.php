<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peliculas extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper('url');

		$this->load->model('Peliculas_mdl');
		
	}

	/**
     * Funcion index para mostrar el login del sitio
     * 
     * 
     */
	public function index()
	{

		$data = new stdClass();
		$objDatos = new stdClass();




		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("peliculas/index",$objDatos,TRUE);
		$this->load->view("template/template", $data);
	}

	public function crear(){
		$data = new stdClass();
		$objDatos = new stdClass();




		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("peliculas/crear",$objDatos,TRUE);
		$this->load->view("template/template", $data);
	}

	public function editar(){


	}

	public function buscar(){


	}

	public function guardar(){

	}
}
