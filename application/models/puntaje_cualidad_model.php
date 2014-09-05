<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class puntaje_cualidad_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function get_puntaje($data)
	{	$procedure="call sp_ingreso_puntaje(?,?,?)";
		$result = $this->db->query($procedure,$data);
		return $result -> result_array();
	}

	public function get_puntaje_active_record($data)
	{
		$result = $this->db->insert('puntaje_cualidad', $data);		
		$data = array('dat_fecha' =>" fecha");
		return $data;
	}
}
 ?>