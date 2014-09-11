<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class cualidad_dia_model extends CI_Model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function get_lista_cualidaddia_all($fecha)
	{
		$query = $this ->db->query ("select cualidad_id,cualidad,versiculo,numeroversiculo,planlectura from get_lista_cualidadversiculoplan_all where fecha='".$fecha."'");
		return $query -> result_array();
	}
	
	public function get_lista_pensamiento_all($fecha)
	{
		$query = $this ->db->query ("select pensamiento,autorpensamiento from get_lista_pensamiento_all where fecha='".$fecha."'");
		return $query -> result_array();
	}

}
 ?>