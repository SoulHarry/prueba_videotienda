<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_mdl extends CI_Model {

	/**
     * Funcion index para mostrar el login del sitio
     * 
     * 
     */
	public function __constructor(){
		parent::__constructor();
    }
    

    /**
	 * Funcion de base de datos que construye una consulta para obtener informacion de la base de datos
	 * 
	 * @param String Cadena que trae los campos para seleccionar en la consulta, si no se envia el parametro, se seleccionan todas las columnas de la tabla
	 * @param Array Arreglo con todas las condiciones o filtros para realizar la consulta
	 * @param String Cadena con los Join, Inner Join, Left Join que sean necesarios para realizar la consulta
	 * @param String Cadena con el Limit para la cosulta
	 * @param String Cadena para ordenar la informacion resultante de la consulta
	 * 
	 * @return Array Con los datos obtenidos de la consulta
	 */
	public function getData($strSelect=NULL, $arrWhere=NULL, $strJoin=NULL, $limit=NULL, $orderBy=NULL){
		
		if(empty($strSelect)){
			$select = '*';
		}else{
			$select = $strSelect;
		}
		
		if(empty($arrWhere)){
			$where = "";
		}else{
			$where = " WHERE ";
			$where .= implode(" AND ",$arrWhere);
		}
		
		if(empty($strJoin)){
			$join = "";
		}else{
			$join = $strJoin;
		}
		
		if(empty($orderBy)){
			$order = "";
		}else{
			$order = " ORDER BY ".$orderBy;
		}
		
		$strQuery = "SELECT $select FROM $this->tabla $join $where $order $limit ";

		$resp = $this->db->query($strQuery);
		
		$db_error = $this->db->error();
		
        if (($db_error['code'] != 0)) {
            throw new Exception('Database error! Error Code [' . $db_error['code'] . '] ');
            return false; // unreachable retrun statement !!!
        }
        
        if( $resp===false ){
			return false;
		}
		
		return $resp->result_array();
		
	}
     
    /**
     * Funcion para actualizar un registro en una tabla
     * @param Array tiene los datos que se deben actualizar en el registro
     * @param Array tiene el nombre del campo y el valor del campo que se debe actualizar
     */
    public function updateRow($arrData,$where){
		
		$this->db->where($where['campo'],$where['valor']);
		$bolAction = $this->db->update($this->tabla,$arrData);
		
		$db_error = $this->db->error();
        if (($db_error['code'] != 0)) {
            throw new Exception('Database error! Error Code [' . $db_error['code'] . '] ');
            return false; // unreachable retrun statement !!!
        }

        return $bolAction;
		
    }

    /**
     * Funcion para agregar un registro a una tabla
     * @param Array Tiene los datos que deben ser almacenados en la tabla
     * 
     * @return Bool Con el resultado de la ejecucion del query
     */
    public function addRow($arrData){

		$bolAction = $this->db->insert($this->tabla, $arrData);
		
		$db_error = $this->db->error();
        if (($db_error['code'] != 0)) {
            throw new Exception('Database error! Error Code [' . $db_error['code'] . '] ');
            return false; // unreachable retrun statement !!!
        }
		
		return $bolAction;
    }
	
	
	public function deleteRow($where){

		$this->db->where($where['campo'],$where['valor']);
		$bolAction = $this->db->delete($this->tabla);
		
		$db_error = $this->db->error();
        if (($db_error['code'] != 0)) {
            throw new Exception('Database error! Error Code [' . $db_error['code'] . '] ');
            return false; // unreachable retrun statement !!!
        }

        return $bolAction;
	}
}