<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		$this->logged_in = $this->session->logged_in ? TRUE : FALSE;
		if (!$this->logged_in) redirect('home/login');
		$this->auth->IfAccessTo('administrador_producto');
		$this->load->model('producto_model');	
	}

	public function index()
	{
		$data = array('Productos' => $this->producto_model->GetData());
		$this->auth->LoadLayout('producto/index', $data);
	}

	public function enable($idproducto)
	{
		$this->producto_model->SetEstado($idproducto, 1);
		redirect(base_url().'Producto');
	}

	public function disable($idproducto)
	{
		$this->producto_model->SetEstado($idproducto, 0);
		redirect(base_url().'Producto');
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->model('categoria_model');
			$data = array('Categorias'=> $this->categoria_model->GetData());
			$this->auth->LoadLayout('producto/add', $data);
		} else {
			$idproducto = $this->producto_model->SetData();
			redirect(base_url().'producto');
		}
	}

	public function edit($idproducto)
	{
		$this->load->model('categoria_model');
		$data = array(
			'Producto' 	=> $this->producto_model->GetData($idproducto),
			'Categorias'=> $this->categoria_model->GetData()
			);		
		$this->auth->LoadLayout('producto/edit', $data);
	}

	public function edit_action($idproducto)
	{
		$this->producto_model->SetData($this->input->post('idproducto'));
		redirect(base_url().'producto/edit/'.$this->input->post('idproducto'));
	}
}

/* End of file producto.php */
/* Location: ./application/controllers/producto.php */