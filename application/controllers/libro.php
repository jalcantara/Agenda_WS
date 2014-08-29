<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class libro extends REST_Controller
{
	public function libro_byid_get()
    {
        $this->load->model('libro_model','cl');
        $id = $this->get('id');
        $libro = $this->cl->get_libro_byid($id);

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