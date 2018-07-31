<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('rrhh_model');	
		
	}

	public function index()
	{		
		$this->auth->LoadLayout('home/index');
	}

    public function forbidden()
	{
		$this->auth->LoadLayout('home/forbidden');
	}	

	public function login()
	{
		$this->auth->authentication($this->session->userdata('logged_in'), $this->session->userdata('rol'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Usuario', 'trim|required');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');

		if ($this->form_validation->run() == FALSE) 
		{
			$data['login_failed'] = FALSE;
			$this->load->view('home/login', $data);
		} else 
		{			
			$userData = $this->rrhh_model->GetLogin($this->input->post('email'));			
			$password = $userData ? $userData->password : '';	
			if ( $this->input->post('password') == $password)
			{				
				print_r($userData);
				$data = array(
					'idusuario' => $userData->idusuario,
					'rol'		=> $userData->rol
					);
				$this->session->set_userdata($data);				
				$this->session->logged_in = TRUE;
				redirect(base_url());
			} else 
			{
				$data['login_failed'] = TRUE;
				$this->load->view('home/login', $data);
			}
		}
	}

	public function logout()
    {
    	if (!$this->session->userdata('logged_in')) redirect(base_url().'home','refresh');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function resetPassword()
    {
    	if (!$this->session->userdata('logged_in')) redirect(base_url().'home','refresh');

    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('password0', 'Contraseña Actual', 'trim|required');
		$this->form_validation->set_rules('password1', 'Contraseña Nueva', 'trim|required');
		$this->form_validation->set_rules('password2', 'Repetir Contraseña', 'trim|required');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('home/password');
		} 
		else 
		{
			$this->rrhh_model->ActualizarPassword($this->session->userdata('idusuario'));
		}    	
    }

    public function changePassword()
    {
    	
    }
}