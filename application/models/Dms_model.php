<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dms_model extends CI_Model 
{
	public function GetRutas($idusuario)
	{
		$this->db->select('
			r.idruta, 
			r.fecha_iniciada,
			r.fecha_procesada,
			r.procedencia, 
			er.nombre AS estado_ruta, 
			r.id_estado_proveido, 
			a.nombre AS area'
			);
		$this->db->from('ruta r');
		$this->db->join('estado_ruta er', 'er.idestado_ruta = r.id_estado_ruta', 'LEFT');
		$this->db->join('estado_proveido ep', 'ep.idestado_proveido = r.id_estado_proveido', 'LEFT');
		$this->db->join('area a', 'a.idarea = r.id_area', 'LEFT');		
		$this->db->where('r.id_autor', $idusuario);		
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function GetRecepcion($usuario)
	{
		$this->db->select('
			proveido.idproveido,
			usuario.nombres, 
			usuario.apellidoPaterno, 
			usuario.apellidoMaterno,  
			proveido.fecha_remitido,
			ruta.procedencia,
			ruta_tipo.nombre,
			proveido.id_estado_proveido,
			proveido.id_proceso_proveido,
			proveido.id_ruta'
			);
		$this->db->from('proveido');
		$this->db->join('usuario', 'usuario.idusuario = proveido.id_emisor', 'LEFT');
		$this->db->join('ruta', 'ruta.idruta = proveido.id_ruta', 'LEFT');
		$this->db->join('ruta_tipo', 'ruta_tipo.idruta_tipo = ruta.id_ruta_tipo', 'LEFT');
		$this->db->where('proveido.id_receptor', $usuario);
		$this->db->order_by('proveido.fecha_remitido', 'desc');
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function GetProveidos($usuario)
	{
		$this->db->select('
			proveido.idproveido,
			usuario.nombres, 
			usuario.apellidoPaterno, 
			usuario.apellidoMaterno,  
			proveido.fecha_remitido,
			proveido.fecha_aceptado,
			proveido.fecha_procesando,
			proveido.fecha_concluido,
			ruta.procedencia,			 
			proveido.asunto,
			proveido.cite,
			tipo_documento.nombre AS documento,
			proveido.adjunto_externo,
			proveido.id_estado_proveido,
			proveido.id_proceso_proveido,
			proveido.id_ruta'
			);
		$this->db->from('proveido');
		$this->db->join('usuario', 'usuario.idusuario = proveido.id_emisor', 'LEFT');
		$this->db->join('ruta', 'ruta.idruta = proveido.id_ruta', 'LEFT');
		$this->db->join('tipo_documento', 'tipo_documento.idtipo_documento = proveido.id_tipo_documento', 'LEFT');
		$this->db->where('proveido.id_receptor', $usuario);
		$this->db->order_by('proveido.fecha_remitido', 'desc');
		$consulta = $this->db->get();
		return $consulta->result();
	}
	public function GetProveidosN($usuario)
	{
		$this->db->select('
			proveido.idproveido,
			usuario.nombres, 
			usuario.apellidoPaterno, 
			usuario.apellidoMaterno,  
			proveido.fecha_remitido,
			proveido.fecha_aceptado,
			proveido.fecha_procesando,
			proveido.fecha_concluido,
			ruta.procedencia,			 
			proveido.asunto,
			proveido.cite,
			tipo_documento.nombre AS documento,
			proveido.adjunto_externo,
			proveido.id_estado_proveido,
			proveido.id_proceso_proveido,
			proveido.id_ruta'
			);
		$this->db->from('proveido');
		$this->db->join('usuario', 'usuario.idusuario = proveido.id_emisor', 'LEFT');
		$this->db->join('ruta', 'ruta.idruta = proveido.id_ruta', 'LEFT');
		$this->db->join('tipo_documento', 'tipo_documento.idtipo_documento = proveido.id_tipo_documento', 'LEFT');
		$this->db->where('proveido.id_emisor', $usuario);
		$this->db->order_by('proveido.fecha_remitido', 'desc');
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function GetProveidosEnviados($usuario)
	{
		$this->db->select('
			proveido.idproveido,
			usuario.nombres, 
			usuario.apellidoPaterno, 
			usuario.apellidoMaterno,  
			proveido.fecha_remitido,
			proveido.fecha_aceptado,
			proveido.fecha_procesando,
			proveido.fecha_concluido,
			ruta.procedencia,			 
			proveido.asunto,
			proveido.cite,
			tipo_documento.nombre AS documento,
			proveido.adjunto_externo,
			proveido.id_estado_proveido,
			proveido.id_proceso_proveido,
			proveido.id_ruta'
			);
		$this->db->from('proveido');
		$this->db->join('usuario', 'usuario.idusuario = proveido.id_emisor', 'LEFT');
		$this->db->join('ruta', 'ruta.idruta = proveido.id_ruta', 'LEFT');
		$this->db->join('tipo_documento', 'tipo_documento.idtipo_documento = proveido.id_tipo_documento', 'LEFT');
		$this->db->where('proveido.id_emisor', $usuario);
		$this->db->order_by('proveido.fecha_remitido', 'desc');
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function GetArchivados($idusuario)
	{
		$this->db->select('
			proveido.idproveido,
			ruta.procedencia,
			proveido.fecha_remitido,
			proveido.asunto,
			proveido.cite,
			proveido.adjunto_externo,
			proveido.id_estado_proveido,
			proveido.id_proceso_proveido,
			proveido.id_ruta'
			);
		$this->db->from('proveido');
		$this->db->join('usuario', 'usuario.idusuario = proveido.id_emisor', 'LEFT');
		$this->db->join('ruta', 'ruta.idruta = proveido.id_ruta', 'LEFT');
		$this->db->where('proveido.id_proceso_proveido', 3);
		$this->db->where('proveido.id_receptor', $idusuario);
		$this->db->order_by('proveido.fecha_remitido', 'desc');
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function GetConfiguration($idusuario)
	{
		$this->db->select('cfgConductoRegular, cfgNuevoInforme, cfgAccesoRutas');
		$this->db->from('usuario');
		$this->db->where('idusuario', $idusuario);
		$consulta = $this->db->get();
		return $consulta->row();
	}

	public function GetNewRuta()
	{
		$this->db->select('AUTO_INCREMENT AS idnuevaruta');
		$this->db->from('information_schema.TABLES');
		$this->db->where('TABLE_SCHEMA', 'siscosed');
		$this->db->where('TABLE_NAME', 'ruta');
		$consulta = $this->db->get();
		$campo = $consulta->row(1);
		return $campo->idnuevaruta;
	}

	public function AddRuta($idusuario, $idarea, $referencia, $rutaTipo)
	{
		$data = array(
			'id_autor' 				=> $idusuario,
			'fecha_iniciada'		=> date('Y-m-d H:i:s'),			
			'procedencia'			=> $referencia,
			'id_estado_ruta'		=> 1,
			'id_estado_proveido'	=> 1,
			'id_area'				=> $idarea,
			'id_ruta_tipo'			=> $rutaTipo
		 );
		$this->db->insert('ruta', $data);
		return $this->db->insert_id(); 
	}

	public function AddProveido($autor, $cite, $tipoDocumento, $destinatario, $proveido, $estadoProveido, $proceso_proveido, $adjuntoexterno, $idruta)
	{
		$data = array(
			'id_emisor'			=> $autor,
			'cite'				=> $cite,
			'id_tipo_documento'	=> $tipoDocumento,			
			'id_receptor'		=> $destinatario,
			'asunto'			=> $proveido,
			'fecha_remitido'	=> date('Y-m-d H:i:s'),	
			'adjunto_externo'	=> $adjuntoexterno,
			'id_estado_proveido'=> $estadoProveido,
			'id_proceso_proveido'=> $proceso_proveido,
			'id_ruta'			=> $idruta
			 );
		$this->db->insert('proveido', $data);
		return $this->db->insert_id();
	}

	public function GetDestinatarios()
	{
		$query = "SELECT u.idusuario, 
					CONCAT_WS(' ', u.nombres, u.apellidoPaterno, u.apellidoMaterno) AS nombre,
					c.nombre AS cargo
				FROM usuario u
				LEFT JOIN cargo c ON u.id_cargo = c.idcargo
				WHERE u.estado = 1 AND (u.rol='2' OR u.rol = '1')
				ORDER BY u.nombres ASC";
		$consulta = $this->db->query($query);
		if ($consulta->num_rows() > 0) 
		{
			return $consulta->result();
		} else {
			return null;
		}
	}

	public function GetUsersOver($iddependencia)
	{
		$query = "SELECT 
					u.idusuario, 
					u.nombres,
					u.apellidoPaterno,
					u.apellidoMaterno,					
					c.nombre AS cargo
				FROM usuario u
				INNER JOIN cargo c ON u.id_cargo = c.idcargo
				WHERE u.estado = 1 AND u.id_cargo = '$iddependencia'
				ORDER BY u.nombres ASC";				
		$consulta = $this->db->query($query);

		if ($consulta->num_rows() > 0) 
		{
			return $consulta->result();
		} else {
			return null;
		}
	}
	
	public function GetUsersBetween($iddependencia)
	{
		$query = "SELECT
					u.idusuario, 
					u.nombres,
					u.apellidoPaterno,
					u.apellidoMaterno,					
					c.nombre AS cargo
				FROM usuario u
				INNER JOIN cargo c ON u.id_cargo = c.idcargo
				WHERE u.estado = 1 AND u.id_dependencia_cargo = '$iddependencia'
				ORDER BY u.nombres ASC";
		$consulta = $this->db->query($query);
		if ($consulta->num_rows() > 0) 
		{
			return $consulta->result();
		} else {
			return null;
		}
	}
	
	public function GetUsersUnder($idcargo)
	{
		$query = "SELECT 
					u.idusuario, 
					u.nombres,
					u.apellidoPaterno,
					u.apellidoMaterno,					
					c.nombre AS cargo
				FROM usuario u
				INNER JOIN cargo c ON u.id_cargo = c.idcargo
				WHERE u.estado = 1  AND u.id_dependencia_cargo = '$idcargo'
				ORDER BY u.nombres ASC";
		$consulta = $this->db->query($query);
		if ($consulta->num_rows() > 0) 
		{
			return $consulta->result();
		} else {
			return null;
		}
	}	

	public function UpdateCite($idarea)
	{
		$this->db->query("UPDATE `area` SET `nroinforme` = `nroinforme` + 1 WHERE `idarea` = ".$idarea);
	}

	public function UpdateRuta($data, $idruta)
	{		
		$this->db->where('idruta', $idruta);
		$this->db->update('ruta', $data);
	}

	public function UpdateProveido($data , $idproveido)
	{
		$this->db->where('idproveido', $idproveido);
		$this->db->update('proveido', $data);		
	}

	public function SetEstadoProveido($idproveido, $estadoProveido, $tipoFecha)
	{
		$data = array(
			'id_estado_proveido'=> $estadoProveido,
			$tipoFecha			=> date('Y-m-d H:i:s')
			);
		$this->db->where('idproveido', $idproveido);
		$this->db->update('proveido', $data);				
	}

	public function SetEstadoRuta($idruta,  $idarea, $estado_proveido, $estado_ruta = '')
	{
		$data['id_estado_proveido'] = $estado_proveido;
		$data['id_area'] = $idarea;
		$this->db->where('idruta', $idruta);
		$this->db->update('ruta', $data);
	}

	public function UpdateProcesoProveido($idproveido, $procesoProveido)
	{
		$data = array(
			'id_proceso_proveido'=> $procesoProveido
			);
		$this->db->where('idproveido', $idproveido);
		$this->db->update('proveido', $data);		
	}

	public function GetProcedencia($idruta)
	{
		$this->db->select('
			usuario.nombres,
			usuario.apellidoPaterno,
			usuario.apellidoMaterno,
			cargo.nombre AS cargo,
			ruta.procedencia,
			ruta_tipo.nombre');
		$this->db->from('ruta');
		$this->db->join('ruta_tipo', 'ruta_tipo.idruta_tipo = ruta.id_ruta_tipo', 'LEFT');
		$this->db->join('usuario', 'usuario.idusuario = ruta.id_autor', 'LEFT');
		$this->db->join('cargo', 'cargo.idcargo = usuario.id_cargo', 'LEFT');
		$this->db->where('idruta', $idruta);
		$consulta = $this->db->get();
		return $consulta->row();
	}

	public function GetAvisos($idruta)
	{
		$query = 'SELECT 
				CONCAT_WS(" ",ud.nombres,ud.apellidoPaterno,ud.apellidoMaterno) AS destinatario,
				cd.nombre AS destinatariocargo
			FROM proveido p
			LEFT JOIN usuario ud ON ud.idusuario=p.id_receptor
			INNER JOIN cargo cd   ON ud.id_cargo = cd.idcargo
			WHERE p.id_ruta = '.$idruta .' AND p.id_proceso_proveido = 4
			ORDER BY p.fecha_remitido ASC';

		$result = $this->db->query($query);

		if ($result->num_rows() >= 1) {
			return $result->result_array();
		} else {			
			return NULL;
		}
	}

	public function GetRutaById($idruta)
	{
		$query = 'SELECT 
				p.fecha_remitido AS fechaenviado,
				p.cite AS cite, 
				p.adjunto_externo AS adjuntoexterno,
				p.id_ruta AS idruta,
				aa.nombre AS autorarea,
				CONCAT_WS(" ",ua.nombres,ua.apellidoPaterno,ua.apellidoMaterno) AS autor,
				ca.nombre AS autorcargo,
				ad.nombre AS destinatarioarea,
				CONCAT_WS(" ",ud.nombres,ud.apellidoPaterno,ud.apellidoMaterno) AS destinatario,		
				cd.nombre AS destinatariocargo,
				td.nombre AS documento,
				p.asunto AS resumen,
				pp.nombre AS proceso 
			FROM proveido p
			INNER JOIN usuario ua ON ua.idusuario=p.id_emisor
			LEFT JOIN usuario ud ON ud.idusuario=p.id_receptor
			INNER JOIN cargo ca   ON ua.id_cargo = ca.idcargo
			INNER JOIN cargo cd   ON ud.id_cargo = cd.idcargo
			INNER JOIN area  aa   ON ua.id_area  = aa.idarea
			INNER JOIN area  ad   ON ud.id_area  = ad.idarea
			LEFT JOIN tipo_documento td ON td.idtipo_documento = p.id_tipo_documento
			LEFT JOIN proceso_proveido pp ON pp.idproceso_proveido = p.id_proceso_proveido
			WHERE p.id_ruta = '.$idruta .'
			ORDER BY p.fecha_remitido ASC';

		$result = $this->db->query($query);

		if ($result->num_rows() >= 1) {
			return $result->result_array();
		} else {			
			return NULL;
		}
	}

	public function GetCiteByUsuario($usuario)
	{
		$this->db->select('
			area.sigla,
			area.nroinforme,
			area.idarea');
		$this->db->from('cite');
		$this->db->join('area', 'area.idarea = cite.id_area', 'left');
		$this->db->where('id_usuario', $usuario);		
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function GetCiteByArea($idarea)
	{
		$this->db->select('
			area.sigla,
			area.nroinforme'
			);
		$this->db->from('area');
		$this->db->where('idarea', $idarea);
		$consulta = $this->db->get();
		return $consulta->row();

	}

	public function GetRutaTipo()
	{
		$consulta = $this->db->get('ruta_tipo');
		return $consulta->result();
	}

	public function GetTipoDocumentos()
	{
		$consulta = $this->db->get('tipo_documento');
		return $consulta->result();
	}

	//____________________________________________//
	public function GetReportBy($atributo, $valor)
	{
		$this->db->select('
			id_ruta,
			referencia,
			resumen,
			estado,			
			');
		$this->db->from('informe');
		$this->db->like($atributo, $valor);
		$this->db->order_by($atributo, 'ASC');
		
		$consulta = $this->db->get();
		return $consulta->result();		
	}

	public function GetReportByAutor($autor)
	{
		$query = 'SELECT 
			i.referencia,
			CONCAT_WS(" ",ua.nombres,ua.apellidoPaterno,ua.apellidoMaterno) AS autor,
			CONCAT_WS(" ",ud.nombres,ud.apellidoPaterno,ud.apellidoMaterno) AS destinatario,
			i.estado,
			i.id_ruta
		FROM informe i
		INNER JOIN usuario ua ON ua.idusuario=i.id_autor
		INNER JOIN usuario ud ON ud.idusuario=i.id_destinatario
		WHERE 
			CONCAT_WS(" ",ua.nombres,ua.apellidoPaterno,ua.apellidoMaterno) LIKE "%'.$autor.'%"  
		ORDER BY fechacreacion ASC;';
		$result = $this->db->query($query);

		if ($result->num_rows() >= 1) {
			return $result->result();
		} else {			
			return NULL;
		}
	}
	
	

	public function ChangeReply($idinforme)
	{
		$data = array(
			'estado' 		=> 'Aceptado',
			'fechaaceptado'	=> date('Y-m-d H:i:s')
			);
		$this->db->where('idinforme', $idinforme);
		$this->db->update('informe', $data);
	}

	public function GetInformesSent($idusuario)
	{
		$query = "SELECT 
					i.idinforme AS idinforme,
					i.cite AS cite,  
					i.fechacreacion AS fecha,
					CONCAT_WS(' ',a1.nombres,a1.apellidoPaterno) AS autor,	 
					CONCAT_WS(' ',a2.nombres,a2.apellidoPaterno) AS destinatario,
					i.referencia AS referencia,
					i.resumen AS resumen,
					i.adjuntoexterno AS externo, 
					i.estado AS estado,
					i.id_ruta AS idruta
				FROM informe i
				INNER JOIN usuario a1 ON i.id_autor = a1.idusuario
				INNER JOIN usuario a2 ON i.id_destinatario = a2.idusuario
				WHERE i.id_autor = $idusuario
				ORDER BY i.idinforme DESC";

		$consulta = $this->db->query($query);
		if ($consulta->num_rows() >=1) {
			return $consulta->result();
		} else {
			return FALSE;
		}
	}

	public function GetInformesReceived($idusuario)
	{
		$query = "SELECT 
					i.idinforme AS idinforme,
					i.cite AS cite,  
					i.fechacreacion AS fecha,
					CONCAT_WS(' ',a1.nombres,a1.apellidoPaterno) AS autor,	 
					CONCAT_WS(' ',a2.nombres,a2.apellidoPaterno) AS destinatario,
					i.referencia AS referencia,
					i.resumen AS resumen,
					i.adjuntoexterno AS externo,
					i.estado AS estado,
					i.id_ruta AS idruta
				FROM informe i
				INNER JOIN usuario a1 ON i.id_autor = a1.idusuario
				INNER JOIN usuario a2 ON i.id_destinatario = a2.idusuario
				WHERE i.id_destinatario = $idusuario
				ORDER BY i.idinforme DESC";

		$consulta = $this->db->query($query);
		if ($consulta->num_rows() >=1) {
			return $consulta->result();
		} else {
			return FALSE;
		}
	}
}

/* End of file informe_model.php */
/* Location: ./application/models/informe_model.php */