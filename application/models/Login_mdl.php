<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('DB_mdl.php');
    class Login_mdl extends DB_mdl{

        function __construct(){
            parent::__construct();
            $this->load->database();
	}
	
	function doLogin($usuario,$password){
		
		$this->db->where("nickname",$usuario);
		$this->db->where("password",md5($password));
		$query = $this->db->get('usuarios');
		
		if($query->num_rows()>0){
			return $query->result_array()[0];
		}else{
			return false;
		}
		
		
	}

}

?>