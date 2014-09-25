<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class multimedia_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function get_lista_multimedia_bycualidadtipo($cualidad_id,$tipo_id)
	{
		$query = $this ->db->query ('select * from get_lista_multimedia_all where cualidad='.$cualidad_id.' and tipo='.$tipo_id);
		return $query -> result_array();
	}
}
 ?>