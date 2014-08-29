<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class cualidad_libro extends REST_Controller
{
	
    public function lista_libro_bycualidad_get()
    {
        $this->load->model('cualidad_libro_model','cl');
        $id = $this->get('id');
        $cualidad_libro = $this->cl->get_lista_libro_bycualidad($id);
        
        if($cualidad_libro)
        {
            $this->response($cualidad_libro, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any cualidad_libro!'), 404);
        }
    }  

}