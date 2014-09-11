<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class cualidad_dia extends REST_Controller
{
	
    public function cualidades_dia_get()
    {
        $this->load->model('cualidad_dia_model','cm');
        $fecha=$this->get("fecha");   
        $cualidad_dia = $this->cm->get_lista_cualidaddia_all($fecha);

        
        if($cualidad_dia)
        {
            $this->response($cualidad_dia, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any cualidad_dia!'), 404);
        }
    }

    public function pensamiento_get()
    {
        $this->load->model('cualidad_dia_model','cm');
        $fecha=$this->get("fecha");
        $pensamiento = $this->cm->get_lista_pensamiento_all($fecha);

        
        if($pensamiento)
        {
            $this->response($pensamiento, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any pensamiento!'), 404);
        }
    }



}