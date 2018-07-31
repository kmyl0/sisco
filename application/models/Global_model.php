<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_model extends CI_Model 
{
	/**
	* GET
	*
	* @param 	string 	$tabla 		Una tabla en particular
	* @param 	string 	$clave 		La clave primaria de la tabla
	* @param 	string  $valor 		El valor de la clave que se esta rastreando en la tabla
	* @param 	boolean $switch 	Si es true retorna una fila de la tabla en otro caso retorna los seleccionados por la clave
	* 
	* @return 	object 	Si solo esta la $tabla retornará la tabla completa, con el resto de los argumentos obligados para retornar 
	*					con respecto al valor de la clave y tabla completa o fila
	*/
	public function Get($tabla, $clave = NULL, $valor = NULL, $switch = FALSE)
	{
		if (is_null($valor)) 
		{
			$consulta = $this->db->get($tabla);
			return $consulta->result();
		}
		$this->db->where($clave, $valor);
		$consulta = $this->db->get($tabla);
		if ($switch) 
		{
			return $consulta->row();
		}
		else
		{
			return $consulta->result();
		}		
	}

	/**
	* SET
	*
	* @param 	string 	$tabla 		Una tabla en particular
	* @param 	string 	$clave 		La clave primaria de la tabla para el update
	* @param 	string  $valor 		El valor de la clave que se esta rastreando en la tabla para update
	* @param 	boolean $id 		Si es true retorna una fila de la tabla en otro caso retorna los seleccionados por la clave
	* 
	* @return 	string 	Si solo esta la $tabla retornará el id de ultima insert, con el resto de los argumentos obligados retornará el id del ultimo id
	*/
	public function Set($tabla, $clave = NULL, $id = NULL)
	{
		$data = array();
		foreach ($this->input->post() as $key => $value) 
		{
			$data[$key] = $value;
		}
		if ($id != NULL)
		{
			$this->db->where($clave, $id);
			$this->db->update($tabla, $data);
		}
		else
		{
			$this->db->insert($tabla, $data);

		}
		return $this->db->insert_id();
	}

	public function GetCell($column, $table, $key, $val)
	{
		$this->db->select($column);
		$this->db->from($table);
		$this->db->where($key, $val);
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file global_model.php */
/* Location: ./application/models/global_model.php */