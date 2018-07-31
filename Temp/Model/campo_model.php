<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campo_model extends CI_Model 
{
	public function GetData($campo = null)
	{
		$this->db->select('*');
		$this->db->from('campo');
		if (is_null($campo))
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		else
		{
			$this->db->where('idcampo', $campo);
			$consulta = $this->db->get();
			return $consulta->row();
		}
	}

	public function GetDataByArea()
	{
		$query = "SELECT * FROM campo WHERE id_areaejemplo = 'Almacen' AND "
		$this->db->select('*');
		$this->db->from('campo');
		$this->db->where('id_areaejemplo', 'Almacen');
		$this->db->last_query();
		$consulta = $this->db->get();
		return $consulta->result();
	}

}

/* End of file campo_model.php */
/* Location: ./application/models/campo_model.php */