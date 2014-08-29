<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class libro_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function get_libro_byid($id)
	{
		$query = $this ->db->query ('select * from get_lista_libro_all where libro_id='.$id);
		return $query -> result_array();
	}

}
 ?>