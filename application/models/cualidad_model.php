<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class cualidad_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function get_lista_cualidad_all($anio)
	{
		$query = $this ->db->query ('select id,cualidad,mes from get_lista_cualidad_all where anio='.$anio);
		return $query -> result_array();
	}
}
 ?>