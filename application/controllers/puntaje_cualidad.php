<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class puntaje_cualidad extends REST_Controller
{
	
    public function puntaje_get()
    {
        $this->load->model('puntaje_cualidad_model','cl');
        
        $fecha = $this->get('fecha');
        $fecha=date_create_from_format("d-m-Y",$fecha);
        $fecha = $fecha->format('Y-m-d');
        $usuario = $this->get('usuario');
        $puntaje = $this->get('puntaje');
        $data = array(
            'dat_fecha' => $fecha, 
            'usuario_id' => $usuario,
            'dec_puntaje' => $puntaje);

        $puntaje_cualidad = $this->cl->get_puntaje($data);
        
        if($puntaje_cualidad)
        {
            $this->response($puntaje_cualidad, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any puntaje_cualidad!'), 404);
        }
    } 
    public function puntaje_activerecord_get()
    {
        $this->load->model('puntaje_cualidad_model','cl');
        
        $fecha = $this->get('fecha');
        $fecha=date_create_from_format("d-m-Y",$fecha);
        $fecha = $fecha->format('Y-m-d');
        $usuario = $this->get('usuario');
        $puntaje = $this->get('puntaje');
        $cualidad = $this->get('cualidad');
        $data = array(
            'dat_fecha' => $fecha, 
            'usuario_id' => $usuario,
            'dec_puntaje' => $puntaje,
            'cualidad_id' => $cualidad);

        $puntaje_cualidad = $this->cl->get_puntaje_active_record($data);
        
        if($puntaje_cualidad)
        {
            $this->response($puntaje_cualidad, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any puntaje_cualidad!'), 404);
        }
    } 

}