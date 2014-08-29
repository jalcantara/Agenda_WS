<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class cualidad_libro_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function get_lista_libro_bycualidad($id)
	{
		$query = $this ->db->query ('select * from get_lista_librocualidad_all where cualidad_id='.$id);
		return $query -> result_array();
	}
}
 ?>