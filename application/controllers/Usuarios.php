<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('Usuarios_mdl');

	}

	/**
     * Funcion index para mostrar el formulario de busqueda pra el modulo
     * 
     * 
     */
	public function index(){

		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}

		$data = new stdClass();
		$objDatos = new stdClass();


		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("usuarios/index",'',TRUE);
		$this->load->view("template/template", $data);
		
	}

	/**
	 * Funcion crear para mostrar el formulario para crear un nuevo usuario
	 */
	public function crear(){
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}

		$data = new stdClass();

		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("usuarios/crear",'',TRUE);
		$this->load->view("template/template", $data);
	}


	/**
	 * Funcion que abre el formulario para editar un usuario
	 * @param String El nickname del usuario para editar
	 * 
	 */
	public function editar($nickname=NULL){

		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}

		$data = new stdClass();
		
		if(empty($nickname)){
			redirect('usuarios');
		}

		$arrWhere[] = " nickname = '{$nickname}'";
		$arrUsuario = $this->Usuarios_mdl->getData(NULL,$arrWhere);

		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("usuarios/editar",$arrUsuario[0],TRUE);
		$this->load->view("template/template", $data);
	}

	/**
	 * Función para mostrar el detalle del usuario seleccionado
	 * @param String El nickname del usuario para mostrar
	 */
	public function detalle($nickname=NULL){
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}

		$data = new stdClass();
		
		if(empty($nickname)){
			redirect('Usuarios');
		}

		$arrWhere[] = " nickname = '{$nickname}'";
		$arrUsuario = $this->Usuarios_mdl->getData(NULL,$arrWhere);

		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("usuarios/detalle",$arrUsuario[0],TRUE);
		$this->load->view("template/template", $data);

	}

	/**
	 * Función que almacena en la tabla usuarios el usuario enviado por ajax al controlador.
	 * Si el usuario ya existe se actualiza la información
	 */
	public function guardar(){
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}

		$arrDatos = array();
		$respuesta = new stdClass();

		$arrDatos['nombre'] = $this->input->post('nombre');
		$arrDatos['nickname'] = $this->input->post('nickname');
		$arrDatos['password'] = md5($this->input->post('password'));
		$id = $this->input->post('id');
		
		if(empty($id)){
			$respuesta->resp = $this->Usuarios_mdl->addRow($arrDatos);
		}else{
			$arrWhere = array("campo"=>"nickname","valor"=>$id);
			$respuesta->resp = $this->Usuarios_mdl->updateRow($arrDatos,$arrWhere);
		}
		
		echo json_encode($respuesta);
	}

	/**
	 * Funcion para validar si el nickname ingresado puede estar duplicado en la base de datos
	 * 
	 * @param String El nickname del uusario que se esta registrando
	 */
	public function duplicado($nickname=NULL){
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}
		$arrWhere = array();
		$respuesta = new stdClass();

		if($nickname == NULL){
			$nickname = $this->input->post('nickname');
		}

		$arrWhere[] = " nickname = '{$nickname}'";
		$arrUsuario = $this->Usuarios_mdl->getData(NULL,$arrWhere);

		if(!empty($arrUsuario)){
			$respuesta->duplicado = TRUE;
		}else{
			$respuesta->duplicado = FALSE;
		}

		echo json_encode($respuesta);

	}

	/**
	 * Función que ejecuta la logica para buscar un registro en la base de datos
	 */
	public function buscar(){
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}

		$objDatos = new stdClass();
		$data = new stdClass();
		$arrWhere = array();

		$nickname = $this->input->post('nickname');
		$nombre = $this->input->post('nombre');

		if(!empty($nickname)){
			$arrWhere[] = " nickname like '%{$nickname}%'";
		}
		if(!empty($nombre)){
			$arrWhere[] = " nombre like '%{$nombre}%'";
		}

		$objDatos->arrData = $this->Usuarios_mdl->getData(NULL,$arrWhere);

		if($objDatos->arrData) {

			$arrEncabezado = array("Nombre", "Nickname", "Eliminar","Ver","Editar");
			$objDatos->resultado = $this->listarUsuarios($arrEncabezado, $objDatos->arrData);
		} else {
			$objDatos->resultado = "No se encontraron datos.";
		}

		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("usuarios/index",$objDatos,TRUE);
		$this->load->view("template/template", $data);
	}

	/**
	 * Funcion para listar los resultados de busqueda en la vista index
	 * @param Array Son los encabezados que quiero mostrar en la tabla de resultados
	 * @param Array Es el resultado de la busqueda realizada
	 * 
	 * @return String con la tabla en HTML para ser mostrada en la vista
	 */
	public function listarUsuarios($arrEncabezado,$arrData){
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
			$nickname = $row['nickname'];
			$strHtml .="<td>{$row['nombre']}</td>";
			$strHtml .="<td>{$row['nickname']}</td>";
			$strHtml .="<td align='center'><a class='fas fa-trash-alt' onclick='fnBorrar(\"$nickname\")' href=''></a></td>";
			$strHtml .="<td align='center'><a class='fas fa-eye' href='".site_url("Usuarios/detalle/{$row['nickname']}")."'></a></td>";
			$strHtml .="<td align='center'><a class='fas fa-pencil-alt' href='".site_url("Usuarios/editar/{$row['nickname']}")."'></a></td>";
			$strHtml .= "</tr>";
		}
		
		$strHtml .= "</tbody></table>";
		
		return $strHtml;

	}

	public function eliminar($nickname=NULL){
		if(!$this->session->has_userdata('nickname')){
			redirect('login');
		}
		if(empty($nickname)){
			redirect('Usuarios');
		}

		$arrWhere = array("campo"=>"nickname","valor"=>$nickname);
		$this->Usuarios_mdl->deleteRow($arrWhere);


		$data = new stdClass();
		$objDatos = new stdClass();


		$data->menu = $this->load->view("template/menu",'',TRUE);
		$data->contenido = $this->load->view("usuarios/index",'',TRUE);
		$this->load->view("template/template", $data);

	}
}