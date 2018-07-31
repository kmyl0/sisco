<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function GetMain($idusuario = NULL)
	{
		$this->db->select('
			u.idusuario,
			u.codigousuario,
			u.apellidoPaterno,
			u.apellidoMaterno,
			u.nombres,
			u.email,
			u.estado,
			u.rol,
			');
		$this->db->from('usuario u');
		if (is_null($idusuario)) 
		{
			$this->db->order_by('u.idusuario', 'ASC');			
			$consulta = $this->db->get();
			return $consulta->result();
		}
		$this->db->where('u.idusuario', $idusuario);
		$consulta = $this->db->get();		
		return $consulta->row();
	}

	public function GetPersonal($idusuario)
	{
		$this->db->select('
			u.idusuario,			
			u.apellidoPaterno,
			u.apellidoMaterno,
			u.nombres,
			u.email,
			u.codigousuario,
			u.estado,
			u.rol,
			');
		$this->db->from('usuario u');
		if (is_null($idusuario)) 
		{
			$this->db->order_by('u.idusuario', 'ASC');			
			$consulta = $this->db->get();
			return $consulta->result();
		}
		$this->db->where('u.idusuario', $idusuario);
		$consulta = $this->db->get();		
		return $consulta->row();
	}

	public function GetPermisos($idusuario)
	{
		$this->db->select('
			u.cfgConductoRegular,
			u.cfgNuevoInforme,
			u.cfgAccesoRutas,
			u.id_cargo,
			u.id_dependencia_cargo
			');
		$this->db->from('usuario u');
		if (is_null($idusuario)) 
		{
			$this->db->order_by('u.idusuario', 'ASC');			
			$consulta = $this->db->get();
			return $consulta->result();
		}
		$this->db->where('u.idusuario', $idusuario);
		$consulta = $this->db->get();		
		return $consulta->row();
	}

	public function GetCargo($idcargo = NULL)
	{
		if (is_null($idcargo)) 
		{
			$consulta = $this->db->get('cargo');
			return $consulta->result();		
		}
		$this->db->where('idcargo', $idcargo);
		$consulta = $this->db->get();
		return $consulta->row();
	}

	public function GetArea($idarea = NULL)
	{
		if (is_null($idarea)) 
		{
			$consulta = $this->db->get('area');
			return $consulta->result();
		}
		$this->db->where('idarea', $idarea);
		$consulta = $this->db->get('area');
		return $consulta->row();
	}

	public function GetCite($idusuario)
	{
		$this->db->select('cite.idcite, cite.id_area, area.nombre, area.nroinforme');
		$this->db->from('cite');
		$this->db->join('area', 'area.idarea = cite.id_area', 'LEFT');
		$this->db->where('cite.id_usuario', $idusuario);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function SetResetPassword($idusuario)
	{
		$this->db->set('password', 123);
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario');
	}

	public function SetUserState($idusuario, $estado)
	{
		$this->db->set('estado', $estado);
		$this->db->where('idusuario', $idusuario);	
		$this->db->update('usuario');
	}

	public function SetPersonal($idusuario, $data)
	{
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario', $data);
	}

	public function SetCite($idcite, $idarea)
	{		
		$data = array('id_area' => $idarea);
		$this->db->where('idcite', $idcite);
		$this->db->update('cite', $data);
	}


   	public function GetData($idusuario = NULL)
	{		
		$this->db->select('
			u.idusuario, 
			u.apellidoPaterno, 
			u.apellidoMaterno, 
			u.nombres,
			u.grado,
			u.fuerza,
			u.regimiento,
			u.carnetMilitar,
			u.fotoPerfil,
			u.ci,
			u.Expedido,
			u.fechaNacimiento,
			u.Sexo AS sexo,
			u.telefono,
			u.celular,
			u.domicilio,
			u.TipoLicencia,
			u.codigoSeguro,
			u.EstadoCivil 			AS estadoCivil,
			u.codigoBiometrico,
			u.email,
			u.password,
			u.estado,
			u.rol,
			u.id_cargo 				AS idcargo,
			c1.nombre 				AS cargo,
			u.id_dependencia_cargo	AS iddependencia,
			c2.nombre 				AS dependencia,
			u.id_area 				AS idarea,
			a.nombre 				AS area,
			a.sigla,
			a.nroinforme
			');		
		$this->db->from('usuario u');
		$this->db->join('cargo c1', 'c1.idcargo = u.id_cargo', 'INNER');
		$this->db->join('cargo c2', 'c2.idcargo = u.id_dependencia_cargo', 'LEFT');	
		$this->db->join('area a', 'a.idarea = u.id_area', 'INNER');	
		if (is_null($idusuario)) 
		{
			$this->db->order_by('u.idusuario', 'ASC');			
			$consulta = $this->db->get();
			return $consulta->result();
		}
		$this->db->where('u.idusuario', $idusuario);
		$consulta = $this->db->get();		
		return $consulta->row();
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */