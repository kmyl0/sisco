<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends CI_Model 
{
	public function GetData($idarea = NULL)
	{
		$this->db->select('*');
		$this->db->from('area');
		if (is_null($idarea)) 
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		else
		{
			$this->db->where('idarea', $idarea);
			$consulta = $this->db->get();
			return $consulta->row();
		}
	}

	public function SetData($idarea = null)
	{
		$data = array(
			'nombre' 	=> $this->input->post('nombre'),
			'sigla' 	=> $this->input->post('estado'),
			'nroinforme'=> $this->input->post('nroinforme'),
			'nroRestanteSolicitud' => $this->input->post('nroRestanteSolicitud')
			);
		if (is_null($idcategoria)) 
		{
			$this->db->insert('categoria', $data);
			return $this->db->insert_id();
		}
		else
		{
			$this->db->where('idcategoria', $idcategoria);
			$this->db->update('categoria', $data);
		}
	}

	public function DescCfgSolicitud($idusuario)
	{
		$data = array(
			'cfgSolicitudRestante' => 'cfgSolicitudRestante-1', );
	}
	public function GetConfiguration($idarea, $configuracion)
	{
		$this->db->select('a.cfgSolicitudRestante AS nroRestante');
		$this->db->from('usuario u');
		$this->db->join('area a', 'a.idarea = u.id_area', 'INNER');
		$this->db->where('u.idusuario', $idusuario);		
		$consulta = $this->db->get();
		return $consulta->row();
	}

	public function GetName($idusuario)
	{
		$this->db->select('a.nombre');
		$this->db->from('usuario u');
		$this->db->join('area a', 'a.idarea = u.id_area', 'INNER');
		$this->db->where('u.idusuario', $idusuario);
		$consulta = $this->db->get();
		return $consulta->row();
	}

	
}

/* End of file area_model.php */
/* Location: ./application/models/area_model.php */