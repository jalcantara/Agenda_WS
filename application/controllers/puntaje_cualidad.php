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
        $cualidad_id = $this->get('cualidad');
        $data = array(
            'dat_fecha' => $fecha, 
            'usuario_id' => $usuario,
            'dec_puntaje' => $puntaje,
            'cualidad_id'=>$cualidad_id);        
        
        if($this->cl->set_puntaje($data))
        {
            $this->response(array('res' => 'ok'), 200);
        }
        else
        {
            $this->response(array('res' => 'error'), 404);
        }
    } 
    public function puntaje_all_get()
    {
        $this->load->model('puntaje_cualidad_model','pc');
        
        $anio = $this->get('anio');
        $usuario = $this->get('usuario');
        $data = array('usuario_id' => $usuario);
        
       $result = $this->pc->get_puntaje_all($data);
        
        if($result)
        {
            $this->response($result, 200);
        }
        else
        {
            $this->response(array('res' => 'error'), 404);
        }    
    }   


}