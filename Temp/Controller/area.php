<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->logged_in = $this->session->logged_in ? TRUE : FALSE;
		if (!$this->logged_in) redirect('home/login');
		$this->auth->IfAccessTo('administrador_area');

		$this->load->model('area_model');
	}

	public function index()
	{
		$data['Areas'] = $this->area_model->GetData();
		$data['Campos'] = $this->campo_model->GetData();
		$this->auth->LoadLayout('area/index',$data);
		
	}

	public function changeState($idcategoria, $estado)
	{
		$this->area_model->SetEstado($idcategoria, $estado);
		redirect(base_url().'area');
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('nombre', 'Nombre', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->auth->LoadLayout('area/add');
		} else {
			$idarea = $this->area_model->SetData();
			redirect(base_url().'area');
		}
	}

	public function edit($idarea)
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$data['area'] = $this->area_model->GetData($idarea);
		$this->auth->LoadLayout('area/edit', $data);
	}

	public function edit_action()
	{
		$this->area_model->SetData($this->input->post('idarea'));
		redirect(base_url().'area/index/');
	}
}

/* End of file area.php */
/* Location: ./application/controllers/area.php */