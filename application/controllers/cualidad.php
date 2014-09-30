<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class cualidad extends REST_Controller
{
	
    public function cualidades_get()
    {
        $this->load->model('cualidad_model','cm');
        $anio=$this->get("anio");
        $cualidad = $this->cm->get_lista_cualidad_all($anio);
        
        if($cualidad)
        {            
            $this->response($cualidad, 200);
        }

        else
        {

            $this->response(array('error' => '¡Error al cargar lista de cualidades!'), 404);            
        }
    }



}