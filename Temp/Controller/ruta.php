<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruta extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->logged_in = $this->session->logged_in ? TRUE : FALSE;
		if (!$this->logged_in) redirect(base_url().'home/login');
		
		$this->load->model('ruta_model');
		$this->load->model('informe_model');
		$this->load->library('pdf');
	}

	public function index()
	{
		
	}

	public function view($idruta)
	{
		$data['rutas'] = $this->ruta_model->GetRutaById($idruta);
		$this->_LoadLayout("ruta/view", $data);
	}

	public function pdf($idruta)
	{
		$data['rutas'] = $this->ruta_model->GetRutaById($idruta);
		$html = $this->load->view('ruta/pdf', $data, TRUE);

		$pageLayout = array(2159, 2794); 
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, true, 'UTF-8', false);

	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('MUGEBUSCH');
	    $pdf->SetTitle('RUTA');
	    $pdf->SetSubject('DOCUMENTOS DE RUTA');
	    $pdf->SetKeywords('RUTA, INFORME');

	    $pdf->SetHeaderData("logomugebusch.png", PDF_HEADER_LOGO_WIDTH);
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
	    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 
	    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

	    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) 
	    {
	        require_once(dirname(__FILE__).'/lang/eng.php');
	        $pdf->setLanguageArray($l);
	    }

	    $pdf->setFontSubsetting(true); 
	    $pdf->SetFont('helvetica', '', 10);
	    $pdf->AddPage();

		$pdf->writeHTML("$html", true, false);

	    $adjuntodocumento = $this->informe_model->GetNameFile().".pdf";
	    $pdf->Output($adjuntodocumento,"I");
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

	function obtenerFechaEnLetra($fecha)
	{
	    $dia= conocerDiaSemanaFecha($fecha);
	    $num = date("j", strtotime($fecha));
	    $anno = date("Y", strtotime($fecha));
	    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
	    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
	    return $dia.', '.$num.' de '.$mes.' del '.$anno;
	}

	function conocerDiaSemanaFecha($fecha) 
	{
	    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
	    $dia = $dias[date('w', strtotime($fecha))];
	    return $dia;
	}
}

/* End of file ruta.php */
/* Location: ./application/controllers/ruta.php */