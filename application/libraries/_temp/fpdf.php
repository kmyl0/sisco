<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."/third_party/fpdf/fpdf.php";

class fpdf extends FPDF
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Header($area = 'SIS', $nroinforme = '1')
	{
		// _____________________Ejemplo______________________________
		// $titulo1 = "INFORME ".$area."-".$nroinforme."/".date('Y');
		// $this->Image(base_url().'img/logo.png',10,8,22);
		// $this->SetFont('Arial','B',13);
		// $this->Cell(30);
		// $this->Cell(120, 10, $titulo1, 0, 0, 'C');
		// $this->Ln('5');
		// $this->SetFont('Arial','B',8);
		// $this->Cell(30);        
		// $this->Cell(120,10,'INFORME INTERNO',0,0,'C');
		// $this->Ln(20);
	}

	public function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

/* End of file pdf.php */
/* Location: ./application/libraries/pdf.php */
