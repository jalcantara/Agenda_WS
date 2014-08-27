<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class cualidad_libro extends REST_Controller
{
	
    public function librocualidad_get()
    {
        $this->load->model('cualidad_libro_model','cl');
        $cualidad_libro = $this->cl->get_lista_librocualidad_all();

        
        if($cualidad_libro)
        {
            $this->response($cualidad_libro, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any cualidad_libro!'), 404);
        }
    }

    public function libro_get()
    {
        $this->load->model('cualidad_libro_model','cl');
        $libro = $this->cl->get_lista_libro_all();

        
        if($libro)
        {
            $this->response($libro, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any libro!'), 404);
        }
    }

   

}