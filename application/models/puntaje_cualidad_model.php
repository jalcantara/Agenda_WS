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

	public function set_puntaje($data)
	{	$procedure="call sp_ingreso_puntaje(?,?,?,?)";
		$result = $this->db->query($procedure,$data);		
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	}
 ?>