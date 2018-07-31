<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rrhh_model extends CI_Model 
{
	public function GetUsuario($idusuario = NULL)
	{
		if (is_null($idusuario)) 
		{
			$consulta = $this->db->get('usuario');
			return $consulta->result();
		}
		$this->db->where('idusuario', $idusuario);
		$consulta = $this->db->get('usuario');
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
	public function GetLogin($email)
	{
		$this->db->select('idusuario, password, rol');
		$this->db->from('usuario');
		$this->db->where('email', $email);
		$consulta = $this->db->get();
		return $consulta->row();
	}

	/*Recursos Humanos*/
	public function SetUser($idusuario = NULL)
	{
		$data = array(
			'estado'				=> $this->input->post('estado'),
			'email'					=> $this->input->post('email'),
			'password'				=> $this->input->post('password'),	
			'codigoBiometrico'		=> $this->input->post('codigoBiometrico'),		
			'id_cargo'				=> $this->input->post('cargo'),
			'id_area'				=> $this->input->post('area'),
			'id_dependencia_cargo' 	=> $this->input->post('dependencia'),			
			'rol'					=> $this->input->post('rol'),
			'cfgConductoRegular'	=> $this->input->post('cfgConductoRegular'),
			'cfgNuevoInforme'		=> $this->input->post('cfgNuevoInforme')
			);
		if ($idusuario != null) 
		{
			$this->db->where('idusuario', $idusuario);
			$this->db->update('usuario', $data);			
		}
		else
		{
			$this->db->insert('usuario', $data);			
		}
		return $this->db->insert_id();
	}
	public function SetUserState($idusuario, $estado)
	{
		$this->db->set('estado', $estado);
		$this->db->where('idusuario', $idusuario);	
		$this->db->update('usuario');
	}
	public function SetDataPersonal($idusuario, $campo, $valor)
	{
		$this->db->set($campo, $valor);
		$this->db->where('idusuario', $idusuario);	
		$this->db->update('usuario');
	}
	/*Contratos*/
	public function GetUserContrato($idusuario = NULL)
	{
		$this->db->where('id_empleado', $idusuario);
		$consulta = $this->db->get('contrato');
		return $consulta->result();
	}
	public function GetContrato($idcontrato = NULL)
	{
		if (is_null($idcontrato)) 
		{
			$consulta = $this->db->get('contrato');
			return $consulta->result();
		}	
		$this->db->where('idcontrato', $idcontrato);
		$consulta = $this->db->get('contrato');
		return $consulta->row();
	}
	public function SetContrato($idcontrato = '')
	{
		echo $idcontrato;
		$data = array(
			'id_contratante' 	=> $this->input->post('id_contratante'),
			'id_empleado' 		=> $this->input->post('id_usuario'),
			'LugarTrabajo'		=> $this->input->post('LugarTrabajo'),
			'fechaIngreso'		=> $this->input->post('fechaIngreso'),
			'fechaSalida'		=> $this->input->post('fechaSalida'),
			'cuentaBanco'		=> $this->input->post('cuentaBanco'),
			'nombreBanco'		=> $this->input->post('nombreBanco'),
			'estado'			=> $this->input->post('estado')
			);
		if ($idcontrato != '') 
		{
			$this->db->where('idcontrato', $idcontrato);
			$this->db->update('contrato', $data);
			//return $this->db->insert_id();
		}
		else
		{
			$this->db->insert('contrato', $data);
			//return $this->db->insert_id();
		}
	}

	/*Formacion Profesional*/
	public function GetUserFormacion($idusuario = NULL)
	{
		$this->db->where('id_usuario', $idusuario);
		$consulta = $this->db->get('formacion');
		return $consulta->result();
	}
	public function GetFormacion($idformacion = NULL)
	{
		if (is_null($idformacion)) 
		{
			$consulta = $this->db->get('formacion');
			return $consulta->result();
		}
		$this->db->where('idformacion', $idformacion);
		$consulta = $this->db->get('formacion');
		return $consulta->row();
	}
	public function SetFormacion($idformacion = NULL)
	{
		$data = array(
			'nombre' 		=> $this->input->post('nombre'),
			'institucion'	=> $this->input->post('institucion'),
			'pais'			=> $this->input->post('pais'),
			'fecha'			=> $this->input->post('fecha'),
			'estado'		=> $this->input->post('estado'),
			'id_usuario'	=> $this->input->post('id_usuario')
			);
		if (is_null($idformacion)) 
		{
			$this->db->insert('formacion', $data);
			return $this->db->insert_id();
		}
		$this->db->where('idformacion', $idformacion);
		$this->db->update('formacion', $data);
		return $this->db->insert_id();
	}

	/*Experiencia Laboral*/
	public function GetUserExperiencia($idusuario = NULL)
	{
		$this->db->where('id_usuario', $idusuario);
		$consulta = $this->db->get('experienciaLaboral');
		return $consulta->result();
	}
	public function GetExperiencia($idexperiencia = NULL)
	{
		if (is_null($idexperiencia)) 
		{
			$consulta = $this->db->get('experienciaLaboral');
			return $consulta->result();
		}
		$this->db->where('idexperienciaLaboral', $idexperiencia);
		$consulta = $this->db->get('experienciaLaboral');
		return $consulta->row();
	}
	public function SetExperiencia($idexperiencia = NULL)
	{
		$data = array(
			'nombreEmpresa' => $this->input->post('nombreEmpresa'),
			'cargoEmpresa'	=> $this->input->post('cargoEmpresa'),
			'estado'		=> $this->input->post('estado'),
			'id_usuario'	=> $this->input->post('id_usuario')
			);
		if (is_null($idexperiencia)) 
		{
			$this->db->insert('experienciaLaboral', $data);
			return $this->db->insert_id();
		}
		$this->db->where('idexperienciaLaboral', $idexperiencia);
		$this->db->update('experienciaLaboral', $data);
		return $this->db->insert_id();
	}

	/*Relacion Familiar*/
	public function GetUserRelacion($idusuario = NULL)
	{
		$this->db->where('id_usuario', $idusuario);
		$consulta = $this->db->get('relacionfamiliar');
		return $consulta->result();
	}
	public function GetRelacion($idrelacion = NULL)
	{
		if (is_null($idrelacion)) 
		{
			$consulta = $this->db->get('relacionfamiliar');
			return $consulta->result();
		}
		$this->db->where('idrelacionFamiliar', $idrelacion);
		$consulta = $this->db->get('relacionfamiliar');
		return $consulta->row();
	}
	public function SetRelacion($idrelacion = NULL)
	{
		$data = array(
			'TipoRelacion' 	=> $this->input->post('TipoRelacion'),
			'nombres'		=> $this->input->post('nombres'),
			'codigoSeguro'	=> $this->input->post('codigoSeguro'),
			'domicilio'		=> $this->input->post('domicilio'),
			'telefono'		=> $this->input->post('telefono'),
			'celular'		=> $this->input->post('celular'),
			'estado'		=> $this->input->post('estado'),
			'id_usuario'	=> $this->input->post('id_usuario')
			);
		if (is_null($idrelacion)) 
		{
			$this->db->insert('relacionfamiliar', $data);
			return $this->db->insert_id();
		}
		$this->db->where('idrelacionFamiliar', $idrelacion);
		$this->db->update('relacionfamiliar', $data);
		return $this->db->insert_id();
	}

	public function GetCVPersonal($idusuario)
	{
		$this->db->select('
			u.idusuario,
			u.apellidoPaterno,
			u.apellidoMaterno,
			u.nombres,
			u.ci,
			u.Expedido,
			u.fechaNacimiento,
			u.sexo,
			u.estadoCivil,
			u.telefono,
			u.celular,
			u.domicilio,
			u.codigoSeguro,
			u.LugarTrabajo,
			u.cuenta,
			u.bancoCuenta
			');
		$this->db->from('usuario u');
		$this->db->where('u.idusuario', $idusuario);
		$consulta = $this->db->get();
		return $consulta->row();
	}
	
	public function SetUserPersonal()
	{
		$data = array(
			'apellidoPaterno' => $this->input->post('apellidoPaterno'),
			'apellidoMaterno' => $this->input->post('apellidoMaterno'),
			'nombres'			=> $this->input->post('nombres'),
			'ci' 				=> $this->input->post('ci'),
			'expedido'			=> $this->input->post('expedido'),
			'fechaNacimiento'	=> $this->input->post('fechaNacimiento'),
			'sexo'				=> $this->input->post('sexo'),
			'estadoCivil'		=> $this->input->post('estadoCivil'),
			'telefono'			=> $this->input->post('telefono'),
			'celular'			=> $this->input->post('celular'),
			'domicilio'			=> $this->input->post('domicilio'),
			'codigoSeguro'		=> $this->input->post('codigoSeguro'),
			'LugarTrabajo'		=> $this->input->post('LugarTrabajo'),
			'cuenta'			=> $this->input->post('cuenta'),
			'bancoCuenta'		=> $this->input->post('bancoCuenta')
			);
		$this->db->where('idusuario', $this->input->post('idusuario'));
	}


	// public function GetAll($idusuario = NULL)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('usuario');
	// 	if (is_null($idusuario)) 
	// 	{
	// 		$consulta = $this->db->get();
	// 		return $consulta->result();
	// 	}
	// 	else
	// 	{
	// 		$this->db->where('idusuario', $idusuario);
	// 		$consulta = $this->db->get();
	// 		return $consulta->row();
	// 	}

	// }

	



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
	public function GetUsers()
	{
		$query = "SELECT u.idusuario, 
					CONCAT_WS(' ', u.nombres, u.apellidoPaterno, u.apellidoMaterno) AS nombre,
					c.nombre AS cargo
				FROM usuario u
				INNER JOIN cargo c ON u.id_cargo = c.idcargo
				WHERE u.estado = 1 AND (u.rol='2' OR u.rol = '1')";
		$consulta = $this->db->query($query);
		if ($consulta->num_rows() > 0) 
		{
			return $consulta->result();
		} else {
			return null;
		}
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

	public function ActualizarPassword($idusuario)
	{
		$data = array('password' => $this->input->post('password2'));
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario', $data);
	}
}

/* End of file rh_model.php */
/* Location: ./application/models/rh_model.php */