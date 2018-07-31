<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{    
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) redirect('home/login');

		$this->load->model('user_model');
		$this->load->model('log_model');
	}   

	//LISTADO DE USUARIOS
	public function index()
	{		
		$data['Usuarios'] = $this->user_model->GetMain();
		$this->auth->LoadLayout('user/index', $data);
	}

	public function user_changestate($idusuario, $estado)
	{
		$this->user_model->SetUserState($idusuario, $estado);
		redirect(base_url().'user');
	}

	public function edit()	
	{
		//VERIFICACION DE ACCESO
			

		//CARGAR LIBRERIA DE VALIDACION
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nombres', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('apellidoPaterno', 'Apellido Paterno', 'trim|required');
		$this->form_validation->set_rules('apellidoMaterno', 'Apellido Materno', 'trim|required');
		$this->form_validation->set_rules('estado', 'Estado', 'trim|required');
		$this->form_validation->set_rules('rol', 'Rol', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required');		
		$this->form_validation->set_rules('estado', 'Estado', 'required');

		if ($this->form_validation->run() === FALSE) 
		{
			$data['Personal'] = $this->user_model->GetPersonal($this->input->post('idusuario'));
			$data['Permisos'] = $this->user_model->GetPermisos($this->input->post('idusuario'));
			$data['Cargos']	= $this->user_model->GetCargo();
			$data['Areas']	= $this->user_model->GetArea();
			$data['Cites']	= $this->user_model->GetCite($this->input->post('idusuario'));

			$this->auth->LoadLayout('user/operacion/editar', $data);
		} 
		else 
		{
			$Personal = $this->user_model->GetPersonal($this->input->post('idusuario'));
			$data = array();
			foreach ($Personal as $clave => $valor) 
			{
				if ($valor != $this->input->post($clave)) 
				{
					$data[$clave] = $this->input->post($clave);
				}
			}

			if (!empty($data)) 
			{
				$this->user_model->SetPersonal($this->input->post('idusuario'), $data);
			}

			$Permiso = $this->user_model->GetPermisos($this->input->post('idusuario'));

			$data = array();

			foreach ($Permiso as $clave => $valor) 
			{
				if ($valor != $this->input->post($clave)) 
				{
					$data[$clave] = $this->input->post($clave);
				}
			}

			if (!empty($data)) 
			{
				$this->user_model->SetPersonal($this->input->post('idusuario'), $data);
			}

			$Cites	= $this->user_model->GetCite($this->input->post('idusuario'));

			print_r($Cites);

			
		}
	}

	public function reset()
	{
		$this->user_model->SetResetPassword($this->input->post('idusuario'));
		//Se envia un correo
	}

	public function editarAsignacionCite()
	{		
		$idarea = $this->input->post('idarea');
		$idcite = $this->input->post('idcite');
		$this->user_model->SetCite($idcite, $idarea);
	}

	public function mdlCiteUsuario()
	{
		$data['Cites']	= $this->user_model->GetCite($this->input->post('idusuario'));
		$this->load->view('user/fragmento/lista/lstCite-Usuario', $data);
	}
}

/* End of file User.php */
