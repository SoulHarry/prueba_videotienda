<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('DB_mdl.php');

class Peliculas_mdl extends DB_mdl {

    var $tabla = 'peliculas';
    
	public function __constructor(){
		parent::__constructor();
	}
}