<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor_model extends CI_Model {

	public function GetData($idproveedor = null)
	{
		$this->db->select('*');
		$this->db->from('proveedor');
		if (is_null($idproveedor))
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		else
		{
			$this->db->where('idproveedor', $idproveedor);
			$consulta = $this->db->get();
			return $consulta->row();
		}
	}

	public function GetDataByName($nombre)
	{
		$query = "SELECT * FROM proveedor WHERE nombre LIKE '%$nombre%'";
		$consulta = $this->db->query($query);
		return $consulta->result();
	}

	public function SetData($idproveedor = null)
	{

		$data = array(
			'nombre' 		=> $this->input->post('nombre'),
			'nit'	 		=> $this->input->post('nit'),
			'direccion' 	=> $this->input->post('direccion'),
			'telefono'		=> $this->input->post('telefono'),
			'observacion'	=> $this->input->post('observacion'),
			'url'			=> $this->input->post('url'),
			'estado'		=> $this->input->post('estado')
			);

		if (is_null($idproveedor)) 
		{

			$this->db->insert('proveedor', $data);
			return $this->db->insert_id();
		}
		else
		{
			$this->db->where('idproveedor', $idproveedor);
			$this->db->update('proveedor', $data);			
		}
	}

	public function SetEstado($idproveedor='', $estado)
	{
		$this->db->set('estado', $estado);
		$this->db->where('idproveedor', $idproveedor);
		$this->db->update('proveedor');
	}
}

/* End of file proveedor_model.php */
/* Location: ./application/models/proveedor_model.php */