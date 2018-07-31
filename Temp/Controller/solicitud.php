<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->logged_in = $this->session->logged_in ? TRUE : FALSE;
		if (!$this->logged_in) redirect('home/login');
		$this->auth->IfAccessTo('user_solicitud');

		$this->load->model('solicitud_model');
	}

	public function index()
	{
		$data['Solicitudes'] = $this->solicitud_model->GetCabecera();
		$this->auth->LoadLayout('solicitud/index', $data);
	}

	public function add()
	{
		$this->load->model('proveedor_model');
		$this->load->model('producto_model');

		$this->load->helper('form');
		$data = array(
			'NroFormulario' => $this->solicitud_model->GetNextId()->idNext,
			'Proveedores' 	=> $this->proveedor_model->GetData(),
			'Productos'		=> $this->producto_model->GetData(),
			'Campos'		=> $this->solicitud_model->GetFlujo($this->session->userdata('idarea'), 1)
			);
		$this->auth->LoadLayout('solicitud/add', $data);
	}

	public function add_action()
	{
		$idcabecera = $this->solicitud_model->SetCabeceraAdd($this->session->userdata('idusuario'));

		$cantidad 	= intval($this->input->post('cantidad'));
		$precio 	= floatval($this->input->post('precioUnitario'));
		$total 		= $cantidad * $precio;

		echo $total;

		$iddetalle = $this->solicitud_model->SetDetalleAdd($total, $idcabecera);
		$this->solicitud_model->SetObservacionAdd($this->session->userdata('idusuario') ,$iddetalle);
		$this->solicitud_model->SetCabeceraEdit($total, $idcabecera);
		redirect(base_url().'solicitud/index');

		// $length = count($Productos);
		// for ($i=0; $i < $length; $i++) 
		// { 
		// 	
		// 	$precio 	= floatval($Precios[$i]);
		// 	$subtotal 	= $cantidad * $precio;
		// 	$total = $total + $subtotal;

		// 	$idsolicitud_detalle = $this->solicitud_model->SetSolicitudDetalle($Productos[$i], $Cantidades[$i], $Precios[$i], $subtotal, $idsolicitud);
		// 	$this->solicitud_model->SetSolicitudObservacion($Observaciones[$i], $this->session->userdata('idusuario'), $idsolicitud_detalle);
		// }
		// $this->solicitud_model->SetSolicitudCabeceraTotal($this->session->userdata('idusuario'), $idsolicitud, $total);
	}

	public function view($idsolicitud)
	{
		$this->load->helper('form');
		$this->load->model('area_model');
		$Cabecera 		= $this->solicitud_model->GetCabecera($idsolicitud);
		$Detalles 		= $this->solicitud_model->GetDetalle($idsolicitud);		
		$Observacion 	= array();
		foreach ($Detalles as $detalle) 
		{
			array_push($Observacion, $this->solicitud_model->GetObservaciones($idsolicitud,$detalle->idsolicitud_detalle));
		}
		if ($Cabecera->estado == 1) 
		{
			$panel = "panel-primary";
		}
		if ($Cabecera->estado == 2) 
		{
			$panel = "panel-warning";
		}
		if ($Cabecera->estado == 3) 
		{
			$panel = "panel-default";
		}
		$data = array(
			'Panel'			=> $panel,
			'Cabeceras' 	=> $Cabecera,
			'Detalles' 		=> $Detalles,
			'Comentarios' 	=> $Observacion
			);
		$this->auth->LoadLayout('solicitud/view', $data);
	}

	public function newComentario()
	{
		$this->solicitud_model->SetObservacionAdd(
			$this->session->userdata('idusuario'),
			$this->input->post('idsolicitud_detalle')
			);

		redirect(base_url().'solicitud/view/'.$this->input->post('idsolicitud_cabecera'));		
	}

	public function details($idsolicitud_cabecera)
	{
		$this->load->helper('form');
		//Cabecera de la solicitud
		$SolicitudCabecera = $this->solicitud_model->GetSolicitudCabeceraById($idsolicitud_cabecera);

		//Detalles de la solicitud
		$SolicitudDetalle = $this->solicitud_model->GetSolicitudDetalleByCabecera($idsolicitud_cabecera);

		$SolicitudObservacion = array();

		foreach ($SolicitudDetalle as $detalle) 
		{
			array_push($SolicitudObservacion, $this->solicitud_model->GetSolicitudObservacionByDetalleAndCabecera($idsolicitud_cabecera, $detalle->idsolicitud_detalle));
		}

		$data = array(
			'Cabecera' 		=> $SolicitudCabecera,
			'Detalles' 		=> $SolicitudDetalle,
			'Comentarios' 	=> $SolicitudObservacion
			);
		$this->_LoadLayout('solicitud/details', $data);		
	}

	

	function _LoadLayout($template, $data = '')
	{
		$this->load->view('template/header');
		switch ($this->session->userdata('rol')) 
		{
			case 'USUARIO':
				$this->load->view('template/nav_user');
				break;
			case 'ADMINISTRADOR':
				$this->load->view('template/nav_administrator');
				break;
			default:
				$this->load->view('template/nav_visitor');
				break;
		}
		$this->load->view($template, $data);
		$this->load->view('template/footer');
	}

	// public function ajaxCodigoProducto()
	// {
	// 	$objDatos = json_decode(file_get_contents("php://input"));		
	// 	$data['Productos'] = $this->solicitud_model->GetProducto($objDatos->nombre);
	// 	$this->load->view('solicitud/ajax', $data);
	// } 

	public function JsonObservaciones($buscar = '')
	{
		

		$json = json_decode(file_get_contents("php://input"));		
		$data = array(
			'Comentarios' => $this->solicitud_model->GetObservacionesBySolicitud($json->idsolicitud, $json->iddetallesolicitud)
			 );		
		$this->load->view('ajax/jsondata', $data);
	}
}

/* End of file orden.php */
/* Location: ./application/controllers/orden.php */
