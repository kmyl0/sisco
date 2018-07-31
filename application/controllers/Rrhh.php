<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rrhh extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		if (!$this->session->userdata('logged_in')) redirect('home/login');
		$this->auth->IfAccessTo('administrator_rrhh', $this->session->userdata('rol'));
		$this->load->model('rrhh_model');
		$this->load->library('form_validation');		
	}

	//LISTADO DE USUARIOS
	public function index()
	{
		$data['Usuarios'] = $this->rrhh_model->GetUsuario();		
		$this->auth->LoadLayout('rrhh/index', $data);
	}	
	public function user_changestate($idusuario, $estado)
	{
		$this->rrhh_model->SetUserState($idusuario, $estado);
		redirect(base_url().'rrhh');
	}

	public function user($action = "", $id = NULL)
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$data['action'] = $action;
			if ($action == "add") 
			{
				$this->load->view('rrhh/parcial/addUser', $data);
			}
			if ($action == "edit") 
			{
				$this->load->model('dms_model');
				$data['DatosPersonales']= $this->rrhh_model->GetData($id);
				$data['Cargos']			= $this->rrhh_model->GetCargo();
				$data['Areas']			= $this->rrhh_model->GetArea();
				$data['Configuracion']	= $this->dms_model->GetConfiguration($id);				
				$this->load->view('rrhh/parcial/editUser', $data);
			}
		} else {
			$this->rrhh_model->SetUser($this->input->post('idusuario'));
			redirect(base_url().'rrhh', 'refresh');	
		}
	}
	public function addUser()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('rrhh/parcial/addUser');
		} else {
			$this->rrhh_model->Set("usuario");					
			redirect(base_url().'rrhh');
		}
	}
	public function editUser($id = NULL)
	{
		$this->load->model('dms_model');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$data = array(
				'DatosPersonales' 	=> $this->rrhh_model->GetData($id),
				'Cargos'			=> $this->rrhh_model->GetCargo(),
				'Areas'				=> $this->rrhh_model->GetArea(),
				'Configuracion'		=> $this->dms_model->GetConfiguration($id)
				);
			$this->load->view('rrhh/parcial/editUser', $data);
		} else {
			$this->rrhh_model->SetUser($this->input->post('idusuario'));
			redirect(base_url().'rrhh', 'refresh');
		}
	}

	//VER INFORMACION DE UN USUARIO
	public function viewUser($idusuario)
	{
		$data['Corresponde'] = $this->rrhh_model->GetData($idusuario);
		$data['DatosContratos'] = $this->rrhh_model->GetUserContrato($idusuario);
		$data['DatosFormacion'] = $this->rrhh_model->GetUserFormacion($idusuario);
		$data['DatosExperiencia'] = $this->rrhh_model->GetUserExperiencia($idusuario);
		$data['DatosRelacion'] = $this->rrhh_model->GetUserRelacion($idusuario);
		$this->auth->LoadLayout('rrhh/viewUser', $data);
	}
	public function editPersonal($idusuario)
	{	
		$data = array(
			'DatosPersonales' 	=> $this->rrhh_model->GetData($idusuario),
			'Cargos'			=> $this->rrhh_model->GetCargo(),
			'Areas'				=> $this->rrhh_model->GetArea()
			);		
		$this->load->view('rrhh/parcial/datosPersonales', $data);
	}
	public function personalChange_proccess($idusuario)
	{
		foreach ($this->input->post() as $campo => $valor) 
		{
			$this->rrhh_model->SetDataPersonal($idusuario, $campo, $valor);
		}		
	}

	/*_____Contratos*/
	public function contrato($action = "", $id = NULL)
	{		
		$this->form_validation->set_rules('id_usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('id_contratante', 'Contratante', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['action'] = $action;
			if ($action == "add") {
				$data['Usuario'] = $this->rrhh_model->GetData($id);
				$data['idContratante'] = $this->session->userdata('idusuario');			
				$this->load->view('rrhh/parcial/addContrato', $data);
			}
			if ($action == "edit") {
				$data['Contrato'] = $this->rrhh_model->GetContrato($id);
				$this->load->view('rrhh/parcial/editContrato', $data);
			}			
		} else {
			$this->rrhh_model->SetContrato($this->input->post('idcontrato'));
			redirect(base_url().'rrhh/viewUser/'.$this->input->post('id_usuario'));
		}
	}

	/*_____Formacion*/
	public function formacion($action = "", $id = NULL)
	{
		$this->form_validation->set_rules('nombre', 'Nombre del Curso', 'required');
		$this->form_validation->set_rules('institucion', 'Nombre de la institución', 'required');
		$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$data['action'] = $action;
			if ($action == "add") 
			{
				$data['Usuario'] = $this->rrhh_model->GetData($id);			
				$this->load->view('rrhh/parcial/addFormacion', $data);
			}
			if ($action == "edit") 
			{
				$data['Formacion'] = $this->rrhh_model->GetFormacion($id);			
				$this->load->view('rrhh/parcial/editFormacion', $data);	
			}
		} else {
			$this->rrhh_model->SetFormacion($this->input->post('idformacion'));
			redirect(base_url().'rrhh/viewUser/'.$this->input->post('id_usuario'));
		}
	}

	/*______Experiencia Laboral*/
	public function experiencia($action = "", $id = NULL)
	{
		$this->form_validation->set_rules('nombreEmpresa', 'Nombre de la empresa', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$data['action'] = $action;
			if ($action == "add") 
			{
				$data['Usuario'] = $this->rrhh_model->GetData($id);			
				$this->load->view('rrhh/parcial/addExperiencia', $data);
			}
			if ($action == "edit") 
			{
				$data['Experiencia'] = $this->rrhh_model->GetExperiencia($id);			
				$this->load->view('rrhh/parcial/editExperiencia', $data);
			}
		} else {
			$this->rrhh_model->SetExperiencia($this->input->post('idexperienciaLaboral'));
			redirect(base_url().'rrhh/viewUser/'.$this->input->post('id_usuario'));
		}
	}

	public function relacion($action = "", $id = NULL)
	{
		$this->form_validation->set_rules('nombres', 'Nombre Completo', 'trim');
		if ($this->form_validation->run() == FALSE) 
		{
			$data['action'] = $action;
			if ($action == "add") 
			{
				$data['Usuario'] = $this->rrhh_model->GetData($id);			
				$this->load->view('rrhh/parcial/addRelacion', $data);
			}
			if ($action == "edit") 
			{
				$data['Relacion'] = $this->rrhh_model->GetRelacion($id);			
				$this->load->view('rrhh/parcial/editRelacion', $data);
			}
		} else {
			$this->rrhh_model->SetRelacion($this->input->post('idrelacionFamiliar'));
			redirect(base_url().'rrhh/viewUser/'.$this->input->post('id_usuario'));
		}
	}
}

/* End of file rrhh.php */
/* Location: ./application/controllers/rrhh.php */