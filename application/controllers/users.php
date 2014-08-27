<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class users extends REST_Controller
{
	
    public function login_get()
    {
        $this->load->model('users_model','us');
        
        $user=$this->get('user');
        $pass=$this->get('pass');

        $users = $this->us->get_login($user,$pass);
        
        if($users)
        {
            $this->response($users, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any user!'), 404);
        }
    }

}