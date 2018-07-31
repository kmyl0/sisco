<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function UserDataByID($idusuario)
	{
		$query = "SELECT 
					CONCAT_WS(' ', u.nombres, u.apellidoPaterno, u.apellidoMaterno) AS nombre,
					u.email 		AS email,
					c.nombre 		AS cargo,
					a.nombre 		AS area,
					a.sigla			AS sigla,
					a.nroinforme 	AS nroinforme
				FROM usuario u
				INNER JOIN
					cargo c ON u.id_cargo = c.idcargo
				INNER JOIN 
					area a  ON u.id_area  = a.idarea
				WHERE
					u.idusuario = $idusuario";
		$consulta = $this->db->query($query);
		if ($consulta->num_rows() >= 1) 
		{
			return $consulta->row();
		} else {
			return NULL;
		}
	}	

	

	public function GetConfigurationHojaRuta($idusuario)
	{
		$this->db->select('cfgConductoRegular');
		$this->db->from('usuario');
		$this->db->where('idusuario', $idusuario);
		$consulta = $this->db->get();
		return $consulta->row();
	}

	public function GetUserDataForLogin($email)
	{
		$query = 'SELECT 
					u.idusuario, 
					CONCAT_WS(" ",u.nombres,u.apellidoPaterno,u.apellidoMaterno) AS nombre, 
					u.fotoPerfil, 
					u.email, 
					c.nombre AS cargo, 
					a.nombre AS area, 
					u.id_area AS idarea,
					u.rol AS rol,
					u.password AS password, 
					u.cfgConductoRegular AS cfgHoraRuta,
					c.idcargo AS idcargo,
					u.id_dependencia_cargo AS dependencia
				FROM usuario u
				INNER JOIN cargo c ON c.idcargo = u.id_cargo
				INNER JOIN area a ON a.idarea = u.id_area
				WHERE u.email = "'.$email.'"';
		$consulta = $this->db->query($query);
		if ( $this->db->count_all_results ()>0)
			return $consulta->result();
		return FALSE;
		
	}

	public function GetUserByID($idusuario)
	{
		$this->db->select('idusuario, nombres, apellidoPaterno, apellidoMaterno');
		$this->db->from('usuario');
		$this->db->where('idusuario', $idusuario);
		$consulta = $this->db->get();
		if ($consulta->num_rows() >0) 
		{
			$resultado = $consulta->row();
			return $resultado;
		} else {
			return null;
		}
	}

	public function GetCargo()
	{
		$query = $this->db->get('cargo');
		if ( $this->db->count_all_results ()>0)
			return $query->result();
		return FALSE;
	}

	public function GetArea()
	{
		$query = $this->db->get('area');
		if ( $this->db->count_all_results ()>0)
			return $query->result();
		return FALSE;
	}

	

	public function SetContrato($idempleado)
	{
		
	}

	public function SetEstado($idusuario, $estado)
	{
		$this->db->set('estado', $estado);
		$this->db->where('idusuario', $idusuario);	
		$this->db->update('usuario');
	}
	public function SetEditUsuario($idusuario, $campo, $valor)
	{
		$this->db->set($campo, $valor);
		$this->db->where('idusuario', $idusuario);	
		$this->db->update('usuario');
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */ 
 ?>