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
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}

		$data = new stdClass();
		$objDatos = new stdClass();




		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("peliculas/index",$objDatos,TRUE);
		$this->load->view("template/template", $data);
	}

	public function crear(){
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}

		$data = new stdClass();
		
		


		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("peliculas/crear",'',TRUE);
		$this->load->view("template/template", $data);
	}

	public function editar($idPelicula=NULL){
		
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}
		$data = new stdClass();
		
		if(empty($idPelicula)){
			redirect('Peliculas');
		}

		$arrWhere[] = " id = '{$idPelicula}'";
		$arrPelicula = $this->Peliculas_mdl->getData(NULL,$arrWhere);
		


		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("peliculas/editar",$arrPelicula[0],TRUE);
		$this->load->view("template/template", $data);

	}

	public function buscar(){
		
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}
		$objDatos = new stdClass();
		$data = new stdClass();
		$arrWhere = array();

		$titulo = $this->input->post('titulo');
		$anio = $this->input->post('anio');

		if(!empty($titulo)){
			$arrWhere[] = " titulo like '%{$titulo}%'";
		}
		if(!empty($anio)){
			$arrWhere[] = " anio = {$anio}";
		}

		$objDatos->arrData = $this->Peliculas_mdl->getData(NULL,$arrWhere);

		if($objDatos->arrData) {

			$arrEncabezado = array("Titulo", "Año", "Sinopsis","Eliminar","Ver","Editar");
			$objDatos->resultado = $this->listarPeliculas($arrEncabezado, $objDatos->arrData);
		} else {
			$objDatos->resultado = "No se encontraron datos.";
		}

		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("peliculas/index",$objDatos,TRUE);
		$this->load->view("template/template", $data);

	}

	public function detalle($idPelicula=NULL){
		
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}
		$data = new stdClass();
		
		if(empty($idPelicula)){
			redirect('Peliculas');
		}

		$arrWhere[] = " id = '{$idPelicula}'";
		$arrPelicula = $this->Peliculas_mdl->getData(NULL,$arrWhere);

		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("peliculas/detalle",$arrPelicula[0],TRUE);
		$this->load->view("template/template", $data);
	}

	public function guardar(){
		
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}
		$arrDatos = array();
		$respuesta = new stdClass();

		$arrDatos['titulo'] = $this->input->post('titulo');
		$arrDatos['sinopsis'] = $this->input->post('sinopsis');
		$arrDatos['anio'] = $this->input->post('anio');
		$id = $this->input->post('id');
		
		if(empty($id)){
			$respuesta->resp = $this->Peliculas_mdl->addRow($arrDatos);
		}else{
			$arrWhere = array("campo"=>"id","valor"=>$id);
			$respuesta->resp = $this->Peliculas_mdl->updateRow($arrDatos,$arrWhere);
		}
		
		echo json_encode($respuesta);
	}

	public function listarPeliculas($arrEncabezado,$arrData){
		
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}
		$strHtml = "<table class='table table-bordered'><thead><tr>";

		foreach($arrEncabezado as $row){
			$strHtml .= '<th>'.$row.'</th>';
		}

		$strHtml .= '</tr></thead><tbody>';
	
		foreach($arrData as $row){
			
			$strHtml .= '<tr>';
			$id = $row['id'];
			$strHtml .="<td>{$row['titulo']}</td>";
			$strHtml .="<td>{$row['anio']}</td>";
			$strHtml .="<td>{$row['sinopsis']}</td>";
			$strHtml .="<td align='center'><a class='fas fa-trash-alt' onclick='fnBorrar(\"$id\")' href=''></a></td>";
			$strHtml .="<td align='center'><a class='fas fa-eye' href='".site_url("Peliculas/detalle/{$row['id']}")."'></a></td>";
			$strHtml .="<td align='center'><a class='fas fa-pencil-alt' href='".site_url("Peliculas/editar/{$row['id']}")."'></a></td>";
			$strHtml .= "</tr>";
		}
		
		$strHtml .= "</tbody></table>";
		
		return $strHtml;

	}

	public function eliminar($idPelicula=NULL){
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}
		if(empty($idPelicula)){
			redirect('Peliculas');
		}

		$arrWhere = array("campo"=>"id","valor"=>$idPelicula);
		$this->Peliculas_mdl->deleteRow($arrWhere);


		$data = new stdClass();


		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("peliculas/index",'',TRUE);
		$this->load->view("template/template", $data);
	}

	
}
