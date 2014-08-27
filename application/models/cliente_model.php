<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class cliente_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function get_cliente_all()
	{
		$query = $this->db->get('cliente');

		return $query->result_array();
	}
}
 ?>