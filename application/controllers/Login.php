<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		
		$this->load->model("Login_mdl");
	}
	
	public function index(){
		if($this->session->has_userdata('nickname')){
			redirect('home');
		}
		
		if(isset($_POST['password'])){
			
			$resp = $this->Login_mdl->doLogin($_POST['nickname'],$_POST['password']);
			
			if($resp){
				$this->session->set_userdata($resp);
				redirect("home");
			}else{
				$this->session->set_flashdata('ErrLogueo', "Credenciales de ingreso incorrecto");
				redirect("login");
			}
			
		}else{
			
			
		}
		
		
		$this->load->view("login");		
	}
	
	
	
	public function logOut() {
		$this->session->sess_destroy();
		redirect('login');
	}
	
}
?>