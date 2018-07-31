<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		$this->logged_in = $this->session->logged_in ? TRUE : FALSE;
		if (!$this->logged_in) redirect('home/login');
		$this->auth->IfAccessTo('administrador_proveedor');

		$this->load->model('proveedor_model');		
	}

	public function index()
	{
		$data = array('Proveedores' => $this->proveedor_model->GetData());
		$this->auth->LoadLayout('proveedor/index', $data);
	}

	public function SetEstado($idproveedor, $estado)
	{
		$this->proveedor_model->SetEstado($idproveedor, $estado);
		redirect(base_url().'proveedor');
	}

	public function enable($idproveedor)
	{
		$this->proveedor_model->SetEstado($idproveedor, 1);
		redirect(base_url().'proveedor');
	}

	public function disable($idproveedor)
	{
		$this->proveedor_model->SetEstado($idproveedor, 0);
		redirect(base_url().'proveedor');
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('nit', 'NIT', 'required|max_length[25]');
		$this->form_validation->set_rules('direccion', 'Dirección');
		$this->form_validation->set_rules('telefono', 'Teléfono');
		$this->form_validation->set_rules('observacion', 'Observación');
		$this->form_validation->set_rules('url', 'URL');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->auth->LoadLayout('proveedor/add');
		} else {
			$idproveedor = $this->proveedor_model->SetData();
			redirect(base_url().'proveedor');
		}
	}

	public function edit($idproveedor)
	{
		$data['Proveedor'] = $this->proveedor_model->GetData($idproveedor);
		$this->auth->LoadLayout('proveedor/edit', $data);
	}

	public function edit_action()
	{
		$this->proveedor_model->SetData($this->input->post('idproveedor'));
		redirect(base_url().'proveedor/edit/'.$this->input->post('idproveedor'));
	}

	public function ajax()
	{
		$nombre = $this->input->get('term');
		$data = array('Proveedores' => $this->proveedor_model->GetDataByName($nombre));
		$this->load->view('ajax/proveedor', $data);
	}
}

/* End of file proveedor.php */
/* Location: ./application/controllers/proveedor.php */