<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class users_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function set_user_social($data)
	{
		$procedure="call sp_registro_usuario(?,?,?,?,?,?)";
		$result = $this->db->query($procedure,$data);
		return $result -> row_array();
	}
}
 ?>