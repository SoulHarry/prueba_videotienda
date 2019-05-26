<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data->contenido = $this->load->view("home/home",$objDatos,TRUE);
		$this->load->view("template/template", $data);
	}
}