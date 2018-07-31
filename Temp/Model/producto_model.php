<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model 
{
	public function GetData($idproducto = NULL)
	{
		$this->db->select('p.idproducto, p.nombre, p.estado, c.nombre AS categoria');
		$this->db->from('producto p');
		$this->db->join('categoria c', 'c.idcategoria = p.id_categoria', 'INNER');
		if (is_null($idproducto))
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		else
		{
			$this->db->where('idproducto', $idproducto);
			$consulta = $this->db->get();
			return $consulta->row();
		}
	}

	public function SetData($idproducto = NULL)
	{
		$data = array(
			'nombre' 		=> $this->input->post('nombre'),
			'id_categoria'	=> $this->input->post('categoria'),
			'estado'		=> $this->input->post('estado')
			);
		if (is_null($idproducto)) 
		{
			$this->db->insert('producto', $data);
			return $this->db->insert_id();
		}
		else
		{
			$this->db->where('idproducto', $idproducto);
			$this->db->update('producto', $data);
		}
	}

	public function SetEstado($idproducto='', $estado)
	{
		$this->db->set('estado', $estado);
		$this->db->where('idproducto', $idproducto);
		$this->db->update('producto');
	}
}

/* End of file producto_model.php */
/* Location: ./application/models/producto_model.php */