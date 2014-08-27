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

	public function get_login($user,$pass)
	{
		//$query = $this ->db->query ('select * from get_lista_cualidad_all;');
		//return $query -> result_array();
	}
}
 ?>