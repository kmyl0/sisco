<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->logged_in = $this->session->logged_in ? TRUE : FALSE;
		if (!$this->logged_in) redirect('home/login');
		$this->auth->IfAccessTo('administrador_seguimiento');

		$this->load->model('seguimiento_model');
	}

	public function index()
	{
		$data = array(
			'Informe' 	=> $this->seguimiento_model->GetInforme(),
			'Rutas'		=> $this->seguimiento_model->GetRuta()
		 );

	}

}

/* End of file seguimiento.php */
/* Location: ./application/controllers/seguimiento.php */