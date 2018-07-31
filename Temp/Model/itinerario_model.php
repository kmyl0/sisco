<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itinerario_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ruta_model');
	}
	public function setInforme($idUsuarioRemitente, $rutaArchivo)
	{
		//* ALTA INFORME *//
		$data = array(
			'id_usuariocreador'		=> $idUsuarioRemitente,
			'fechacreacion'			=> date('Y-m-d'),
			'referencia'			=> $this->input->post('referencia'),			
			'antecedente'			=> $this->input->post('antecedentes'),
			'analisis'				=> $this->input->post('analisis'),
			'conclusion'			=> $this->input->post('conclusion'),
			'documento'				=> $rutaArchivo
			);
		$this->db->insert('informe', $data);
		$idinforme = $this->db->insert_id();

		// NUEVA RUTA
		$destinatario = $this->input->post('destinatario');
		$this->ruta_model->setNewRuta($data, $idinforme, $destinatario);
	}

	public function GetAreaData($idusuario)
	{
		$query = "SELECT CONCAT_WS(' ',u.nombre, u.apellidoPaterno, u.apellidoMaterno) AS nombre, a.idarea AS area, a.nroinforme AS nroinforme, c.nombre AS cargo
			FROM usuario u
			INNER JOIN area a ON u.id_area = a.idarea
			INNER JOIN cargo c ON u.id_cargo = c.idcargo
			WHERE u.idusuario = $idusuario";

		$result = $this->db->query($query);
		if ($result->num_rows() >= 1) {
			return $result->row();
		} else {
			return NULL;
		}
	}

	public function incrementarNroInforme($idusuario)
	{
		$idarea = $this->itinerario_model->GetAreaData($idusuario)->area;
		$query = "UPDATE dms.area SET nroinforme = nroinforme + 1 WHERE idarea = '$idarea'";
		$this->db->query($query);
	}

	

	public function getAuthorInforme($idinforme)
	{
		$this->db->select('idinforme, id_autor, referencia, fechacreacion, documento, estado');
		$this->db->from('informe');
		$this->db->where('idinforme', $idinforme);

		$consulta = $this->db->get();
		if ($consulta->num_rows() >= 1) {
			return $consulta->row();
		} else {
			return FALSE;
		}
	}

	public function GetRutaAsSender($idusuario = 0)
	{
		$query = "SELECT 
					r.idruta, 
					r.tema, 
					r.glosa, 
					r.fecha, 
					r.id_informe, 
					CONCAT_WS(' ', u1.nombre, u1.apellidoPaterno, u1.apellidoMaterno) AS remitente,
					CONCAT_WS(' ', u2.nombre, u2.apellidoPaterno, u2.apellidoMaterno) AS destinatario, 
					r.estado, 
					r.esvisto,
					r.esfinalizado
				FROM 
					dms.ruta r
				INNER JOIN
					dms.usuario u1 ON r.id_usuarioremitente    = u1.idusuario
				INNER JOIN
					dms.usuario u2 ON r.id_usuariodestinatario = u2.idusuario
				WHERE r.id_usuarioremitente = '$idusuario' 
				ORDER BY r.idruta DESC	";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function GetRutaByInfome($idinforme)
	{
		$query = "SELECT 
					r.idruta, 
					r.tema, 
					r.glosa, 
					r.fecha, 
					r.id_informe, 
					CONCAT_WS(' ', u1.nombre, u1.apellidoPaterno, u1.apellidoMaterno) AS remitente,
					CONCAT_WS(' ', u2.nombre, u2.apellidoPaterno, u2.apellidoMaterno) AS destinatario, 
					r.estado, 
					r.esvisto,
					r.esfinalizado
				FROM 
					dms.ruta r
				INNER JOIN
					dms.usuario u1 ON r.id_usuarioremitente    = u1.idusuario
				INNER JOIN
					dms.usuario u2 ON r.id_usuariodestinatario = u2.idusuario
				WHERE
					r.id_informe = $idinforme
				ORDER BY r.idruta DESC";
		$consulta = $this->db->query($query);
		if ($consulta->num_rows() >=1) {
			return $consulta->result();
		} else {
			return FALSE;
		}
	}
}

/* End of file itinerario_model.php */
/* Location: ./application/models/itinerario_model.php */