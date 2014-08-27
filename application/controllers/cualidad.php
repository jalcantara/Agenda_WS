<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class cualidad extends REST_Controller
{
	
    public function cualidades_get()
    {
        $this->load->model('cualidad_model','cm');
        $cualidad = $this->cm->get_lista_cualidad_all();
        
        if($cualidad)
        {
           /*$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($cualidad));  */
            $this->response($cualidad, 200); // 200 being the HTTP response code
        }

        else
        {

            $this->response(array('error' => 'Couldn\'t find any cualidad!'), 404);
        }
    }



}