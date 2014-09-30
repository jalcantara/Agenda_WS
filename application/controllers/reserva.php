<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class reserva extends REST_Controller
{
	
    public function reserva_libro_get()
    {
        $this->load->model('reserva_model','cl');
        
        $usuario = $this->get('usuario');
        $libro = $this->get('libro');
        $data = array(
            'usuario' => $usuario,
            'libro' => $libro);

        $reserva = $this->cl->get_reserva($data);
        
        if($reserva)
        {
            $this->response($reserva, 200);
        }

        else
        {
            $this->response('error' => '¡Error al realizar reserva!'), 404);
        }
    } 
}