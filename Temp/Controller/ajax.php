<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('proveedor_model');
	}

	public function proveedor($texto = '')
	{
		
	}

}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */