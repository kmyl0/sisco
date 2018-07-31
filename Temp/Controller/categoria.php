<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		$this->logged_in = $this->session->logged_in ? TRUE : FALSE;
		if (!$this->logged_in) redirect('home/login');
		$this->auth->IfAccessTo('administrador_categoria');

		$this->load->model('categoria_model');
	}

	public function index()
	{
		$data = array('Categorias' => $this->categoria_model->GetData());
		$this->auth->LoadLayout('categoria/index', $data);
	}

	public function changeState($idcategoria, $estado)
	{
		$this->categoria_model->SetEstado($idcategoria, $estado);
		redirect(base_url().'categoria');
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('nombre', 'Nombre', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->auth->LoadLayout('categoria/add');
		} else {
			$idcategoria = $this->categoria_model->SetData();
			redirect(base_url().'categoria');
		}
	}

	public function edit($idcategoria)
	{
		$data['Categoria'] = $this->categoria_model->GetData($idcategoria);
		$this->auth->LoadLayout('categoria/edit', $data);
	}

	public function edit_action()
	{
		$this->categoria_model->SetData($this->input->post('idcategoria'));
		redirect(base_url().'categoria/index/');
	}
}

/* End of file categoria.php */
/* Location: ./application/controllers/categoria.php */