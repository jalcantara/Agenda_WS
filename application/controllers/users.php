<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'/libraries/REST_Controller.php';

class users extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    
    public function login_post()
    {
        $this->load->model('users_model','us');        
        $username=$this->post('username');
        $password=$this->post('password');
        $tipo=$this->post('tipo');

        if($tipo&&intval($tipo)==1){
            if($username&&$password){
                $remember = (bool) $this->input->post('remember');
                if ($this->ion_auth->login($username, $password,$remember))
                {
                    $id = $this->ion_auth->user()->row()->id;
                    $usuario = $this->ion_auth->user()->row()->username;
                    $email = $this->ion_auth->user()->row()->email;
                    
                    $this->response(array('id' =>$id,'usuario'=>$usuario,'email'=>$email), 200);
                }
                else
                {
                   $this->response(array('error' => 'Usuario o clave incorrectos'), 404); 
                } 
            }else{
                $this->response(array('error' => 'Parámetros incorrectos'), 400);
            }

        }elseif($tipo&&intval($tipo)==2){
            //Case si fuera WEB
        }       
    }

    function create_user_post()
    {

        $username=$this->post('username');
        $password=$this->post('password');
        $email=$this->post('email');
        $tipo=$this->post('tipo');

        if($tipo&&intval($tipo)==1){
            if($username&&$password&&$email){
                $user_id = $this->ion_auth->register
                (
                    $username,  
                    $password, 
                    $email
                );

                if ($user_id === FALSE)                    
                    $this->response(array('res' => 'error'), 404); 
                else
                {
                    $this->response(array('res' => 'ok','data'=>$user_id), 200);                   
                }
               
            }else{
                $this->response(array('res' => 'error','data'=>'Parámetros incorrectos'), 400);
            }

        }elseif($tipo&&intval($tipo)==2){
            //Case si fuera WEB
        }       
    }

    function create_user2_post()
    {

        $username=$this->post('username');
        $password=$this->post('password');
        $email=$this->post('email');
        $tipo=$this->post('tipo');

        if($tipo&&intval($tipo)==1){
            if($username&&$password&&$email){
                $user_id = $this->ion_auth->register2
                (
                    $username,  
                    $password, 
                    $email
                );

                if ($user_id !== FALSE)        
                    $this->response(array('res' => 'ok','data' => $user_id), 200);                     
                else
                {
                    $this->response(array('res' => 'error'), 404);                  
                }
               
            }else{
                $this->response(array('res' => 'error', 404));
            }

        }elseif($tipo&&intval($tipo)==2){
            //Case si fuera WEB
        }       
    }

    function create_user_social_post()
    {
        $username=$this->post('username');
        $email=$this->post('email');
        $firstname=$this->post('firstname');
        $lastname=$this->post('lastname');
        $tipo=$this->post('tipo');

        if($tipo&&intval($tipo)==1){
            if($username&&$email&&$firstname&&$lastname){
                $this->load->model('users_model','um');

                $data = array(
                            'username' => $username,
                            'email' => $email,
                            'firstname' => $firstname,
                            'lastname' => $lastname);
                $usuario_id = $this->um->set_user_social($data);                
                if($usuario_id)
                {
                    $this->response(array('res' => 'ok','data'=>$usuario_id['id']), 200); // 200 being the HTTP response code
                }
                else
                {
                    $this->response(array('res' => 'error'), 404); 
                }
            }else{
                $this->response(array('res' => 'error','data'=>'Parámetros incorrectos'), 400);
            }

        }elseif($tipo&&intval($tipo)==2){
            //Case si fuera WEB
        }       
    }

    public function logout()
    {
        $this->data['title'] = "Logout";
        $logout = $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('/login', 'refresh');
    }

    public function getUsersAll(){
        $result = $this->ion_auth->users_personal();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('aaData' => $result)));
    }

    function forgot_password()
    {   
        if(isset($_POST['email']))
        {
            if($_POST['email'] != "")
            {
                $identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
                if(empty($identity)) 
                {
                    $this->ion_auth->set_message('forgot_password_email_not_found');
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect("auth/forgot_password", 'refresh');
                }
                
                //run the forgotten password method to email an activation code to the user
                $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

                if ($forgotten)
                {
                    //if there were no errors
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
                }
                else
                {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect("auth/forgot_password", 'refresh');
                }
            }
            else
            {
                $this->ion_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth/forgot_password", 'refresh');
            }
                
        }
        else
        {
            $this->data['message'] = $this->session->flashdata('message');
            $dataheader['isloginview'] = true;
            $dataheader['title'] = 'Dicars - Select Local';
            $this->load->view('templates/headers.php',$dataheader);         
            $this->load->view('login/forgot_password',$this->data);
            $datafooter['jsvista'] = '';
            $datafooter['active'] = '';
            $this->load->view('templates/footer.php',$datafooter);
        }
    }

    //change password
    function change_password()
    {
        if ($this->ion_auth->logged_in())   
        {   
            if(isset($_POST) && !empty($_POST))
            {
                $form = $this->input->post('formulario');               
                $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));
                $change = $this->ion_auth->change_password($identity,$form["oldpassword"], $form["password"]);
                if ($change)
                    $this->logout();
                else
                    $this->output->set_status_header('400');
            }   
            else
                $this->output->set_status_header('400');
        }
        else
            $this->output->set_status_header('400');

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode("finish"));
    }

    //activate the user
    function activate()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $activation = $this->ion_auth->activate($this->input->post('user_id'));
            if (!$activation)
                $this->output->set_status_header('400');
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode("finish"));
    }

    //deactivate the user
    function deactivate()
    {
        $is_admin = FALSE;
        if(isset($_POST) && !empty($_POST))
        {
            $user_id = $this->input->post('user_id');
            if(!$this->ion_auth->is_admin($user_id))
                $this->ion_auth->deactivate($user_id);
            else
                $is_admin = TRUE;
        }
        else
            $this->output->set_status_header('400');

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array("is_admin"=>$is_admin)));
    }

    //edit a user
    function edit_user()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $formserialized = $this->input->post("formulario");
            $form = array();
            parse_str($formserialized,$form);
            $user_id = $form["user_id"];

            if(!$this->ion_auth->is_admin($user_id))
            {
                if($form["password"]!="")
                {
                    $data = array("password" => $form["password"], "remember_code" => 0,"forgotten_password_time" =>0,
                        "forgotten_password_code"=>0, "activation_code"=> 0);
                    $this->ion_auth->update($user_id, $data);
                }

                if (isset($form["groups"]) && !empty($form["groups"]))
                {           
                    $this->ion_auth->remove_from_group('', $user_id);
                    foreach ($form["groups"] as $grp)
                    {
                        $this->ion_auth->add_to_group($grp, $user_id);
                    }
                }
            }
        }
        else
            $this->output->set_status_header('400');

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode("finish"));
    }

    // create a new group
    function create_group()
    {
        $this->data['title'] = $this->lang->line('create_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        if (isset($_POST['group_name']) && isset($_POST['description']))
        {
            $additional_data = array(
                "tipo"=>$this->input->post('tipo')
                );
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'),$additional_data);
            if($new_group_id)
            {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth", 'refresh');
            }
        }
        else
        {
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->_render_page('auth/create_group', $this->data);
        }
    }

    function _render_page($view, $data=null, $render=false)
    {

        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $this->load->view($view, $this->viewdata, $render);

        if (!$render) return $view_html;
    }


}