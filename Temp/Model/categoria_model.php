<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model 
{
	public function GetData($idcategoria = null)
	{
		$this->db->select('*');
		$this->db->from('categoria');
		if (is_null($idcategoria)) 
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		else
		{
			$this->db->where('idcategoria', $idcategoria);
			$consulta = $this->db->get();
			return $consulta->row();
		}
	}

	public function SetData($idcategoria = null)
	{
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'estado' => $this->input->post('estado')
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

	public function SetEstado($idcategoria='', $estado)
	{
		$this->db->set('estado', $estado);
		$this->db->where('idcategoria', $idcategoria);
		$this->db->update('categoria');
	}
}

/* End of file categoria_model.php */
/* Location: ./application/models/categoria_model.php */