<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class reserva_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function get_reserva($data)
	{	$procedure="call sp_ingreso_reserva(?,?)";
		$result = $this->db->query($procedure,$data);
		return $result -> result_array();
	}
	
}
 ?>