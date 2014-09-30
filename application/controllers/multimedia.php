<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class multimedia extends REST_Controller
{
	
    public function lista_multimedia_bycualidadtipo_get()
    {
        $this->load->model('multimedia_model','mm');
        $cualidad_id = $this->get('cualidad');
        $tipo_id = $this->get('tipo');
        $cualidad_libro = $this->mm->get_lista_multimedia_bycualidadtipo($cualidad_id,$tipo_id);
        
        if($cualidad_libro)
        {
            $this->response($cualidad_libro, 200);
        }

        else
        {
            $this->response(array('res' => 'error'), 404);
        }
    }  

    public function multimedia_byid_get()
    {
        $this->load->model('multimedia_model','mm');
        $multimedia_id = $this->get('id');
        $cualidad_libro = $this->mm->get_multimedia_byid($multimedia_id);
        
        if($cualidad_libro)
        {
            $this->response($cualidad_libro, 200); 
        }

        else
        {
            $this->response(array('res' => 'error'), 404);
        }
    }    

}