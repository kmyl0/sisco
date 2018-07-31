<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->logged_in = $this->session->logged_in ? TRUE : FALSE;
		if (!$this->logged_in) redirect('home/login','refresh');
		$this->auth->IfAccessTo('administrator_user');

		$this->load->model('user_model');
		$this->load->model('rrhh_model');
	}

	public function index()
	{
		$data['Usuarios'] = $this->rrhh_model->GetIndex();		
		$this->auth->LoadLayout('user/index', $data);
	}

	public function change_state($idusuario, $estado)
	{
		$this->user_model->SetEstado($idusuario, $estado);
		redirect(base_url().'user');
	}

	public function view($idusuario)
	{
		
		$data['DatosPersonales'] 	= $this->user_model->GetUserDataById($idusuario);		
		$this->auth->LoadLayout('user/view', $data);
	}

	public function edit($idusuario)
	{
		$data['DatosPersonales'] 	= $this->user_model->GetData($idusuario);
		$data['Cargos']				= $this->user_model->GetCargo();
		$data['Areas']				= $this->user_model->GetArea();
		$this->auth->LoadLayout('user/edit', $data);
	}

	public function edit_access()
	{
		$this->user_model->SetUsuario($this->input->post('idusuario'));
		redirect(base_url().'user');
	}

	public function change()
	{
		$data['Usuarios'] = $this->user_model->GetForList();		
		$this->auth->LoadLayout('user/change', $data);
	}

	public function change_view($idusuario)
	{
		$data['DatosPersonales'] 	= $this->user_model->GetData($idusuario);	
		$data['Cargos']				= $this->user_model->GetCargo();
		$data['Areas']				= $this->user_model->GetArea();
		$this->auth->LoadLayout('user/change_view', $data);
	}

	

	public function create()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[5]|max_length[16]');
		$this->form_validation->set_rules('cargo', 'Cargo', 'required');
		$this->form_validation->set_rules('area', 'Área', 'required');
		$this->form_validation->set_rules('dependencia', 'Dependencia', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		$this->form_validation->set_rules('rol', 'Rol', 'required');

		if ($this->form_validation->run() === FALSE) 
		{
			$data = array(
				'Cargos' 	=> $this->user_model->GetCargo(),
				'Areas'		=> $this->user_model->GetArea() 
				);
			$this->auth->LoadLayout('user/create', $data);
		} else 
		{
			$idempleado = $this->user_model->SetUsuario();
			redirect(base_url().'user/index');			
		}
	}

	public function profile()
	{
		
		$data['Usuario'] = $this->user_model->GetUserDataForLogin($this->session->userdata('email'));			
		$this->auth->LoadLayout('user/profile', $data);
		print_r($this->session->userdata());
	}

	public function GetConfiguracion($idusuario, $configuracion)
	{
		$this->db->select($configuracion);
		$this->db->from('usuario');
		$this->db->where('$idusuario', $idusuario);
		$consulta = $this->db->get();
		return $consulta->row();
	}

	public function editAngular($idusuario)
	{
		$data['DatosPersonales'] 	= $this->user_model->GetData($idusuario);
		$data['Cargos']				= $this->user_model->GetCargo();
		$data['Areas']				= $this->user_model->GetArea();
		$this->auth->LoadParcial('user/parcial', $data);		
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */ ?>