<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento_model extends CI_Model 
{
	public function GetInforme($idinforme = NULL)
	{
		$this->db->select('*');
		$this->db->from('informe');
		if (is_null($idinforme)) 
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		else
		{
			$this->db->where('idinforme', $idinforme);
			$consulta = $this->db->get();
			return $consulta->row();
		}
	}

	public function GetRuta($idruta = NULL)
	{
		$this->db->select('*');
		$this->db->from('ruta');
		if (is_null($idruta)) 
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		else
		{
			$this->db->where('idruta', $idruta);
			$consulta = $this->db->get();
			return $consulta->row();
		}
	}

	public function GetData($idruta = NULL)
	{
		$this->db->select('
			i.fechacreacion AS fechaenviado,
			i.cite AS cite, 
			i.adjuntoexterno AS adjuntoexterno,
			i.id_ruta AS idruta,
			aa.nombre AS autorarea,
			CONCAT_WS(" ",ua.nombres,ua.apellidoPaterno,ua.apellidoMaterno) AS autor,
			ca.nombre AS autorcargo,
			ad.nombre AS destinatarioarea,
			CONCAT_WS(" ",ud.nombres,ud.apellidoPaterno,ud.apellidoMaterno) AS destinatario,
			cd.nombre AS destinatariocargo,
			i.referencia, 
			i.resumen');
		$this->db->from('informe i');
		$this->db->join('usuario ua', 	'ua.idusuario=i.id_autor', 			'INNER');
		$this->db->join('usuario ud', 	'ud.idusuario=i.id_destinatario', 	'INNER');
		$this->db->join('cargo ca', 	'ua.id_cargo = ca.idcargo', 		'INNER');
		$this->db->join('cargo cd', 	'ud.id_cargo = cd.idcargo', 		'INNER');
		$this->db->join('area aa', 		'ua.id_area  = aa.idarea', 			'INNER');
		$this->db->join('area ad', 		'ud.id_area  = ad.idarea', 			'INNER');
		if (is_null($idruta)) 
		{
			$consulta = $this->db->get();			
		}
		else
		{
			$this->db->where('i.idruta', $Value);
			$consulta = $this->db->get();			
		}
		return $consulta->result();
		
	}
	

}

/* End of file seguimiento_model.php */
/* Location: ./application/models/seguimiento_model.php */