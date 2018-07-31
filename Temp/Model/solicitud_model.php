<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class solicitud_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('area_model');
		$this->load->model('user_model');
	}

	public function GetNextId()
	{
		$query = "SELECT AUTO_INCREMENT AS idNext FROM information_schema.TABLES WHERE TABLE_SCHEMA='dms' and TABLE_NAME='solicitud_cabecera'";
		$consulta = $this->db->query($query);
		return $consulta->row();		 
	}

	public function GetCabecera($idcabecera = '', $idusuario = '')
	{
		$this->db->select('
			s.idsolicitud_cabecera,
			s.fecha,
			s.total,
			s.estado,
			CONCAT_WS(" ", u.nombres, u.apellidoPaterno, u.apellidoMaterno) AS usuario,
			p.nombre AS proveedor
			');
		$this->db->from('solicitud_cabecera s');
		$this->db->join('proveedor p', 'p.idproveedor = s.id_proveedor', 'INNER');
		$this->db->join('usuario u', 'u.idusuario = s.id_usuario', 'INNER');
		if ($idcabecera == '' && $idusuario == '')
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		if ($idcabecera != '' && $idusuario == '') 
		{
			$this->db->where('s.idsolicitud_cabecera', $idcabecera);
			$consulta = $this->db->get();
			return $consulta->row();
		}
		if ($idcabecera == '' && $idusuario != '') 
		{
			$this->db->where('s.id_usuario', $idusuario);
			$consulta = $this->db->get();
			return $consulta->result();
		}
	}

	public function SetCabeceraAdd($idusuario)
	{
		$data = array(
			'fecha' 		=> date('Y-m-d H:i:s'),
			'estado'		=> $this->input->post('estado'),
			'id_proveedor'	=> $this->input->post('proveedor'),
			'id_usuario'		=> $idusuario
			);
		$this->db->insert('solicitud_cabecera', $data);
		return $this->db->insert_id();
	}

	public function SetCabeceraEdit($total, $idcabecera)
	{
		$data = array(
			'total' 	=> $total);
		$this->db->where('idsolicitud_cabecera', $idcabecera);
		$this->db->update('solicitud_cabecera', $data);
	}

	public function SetDetalleAdd($total, $idcabecera)
	{
		$data = array(
			'id_producto' 			=> $this->input->post('producto'),
			'cantidad'				=> $this->input->post('cantidad'),
			'preciounitario'		=> $this->input->post('precioUnitario'),
			'subtotal'				=> $total,
			'detalle'				=> $this->input->post('detalle'),
			'id_solicitud_cabecera' => $idcabecera
			);
		$this->db->insert('solicitud_detalle', $data);
		return $this->db->insert_id();
	}

	public function SetDetalleEdit()
	{
		$this->db->update('solicitud_detalle', $data);
		$this->db->where('idsolicitud_detalle', $iddetalle);
	}

	public function SetObservacionAdd($idusuario, $iddetalle)
	{
		$data = array(
			'observacion' 	=> $this->input->post('observacion'),
			'fecha'			=> date('Y-m-d H:i:s'),
			'id_usuario'	=> $idusuario,
			'id_solicitud_detalle' => $iddetalle
			);
		$this->db->insert('solicitud_observacion', $data);
		return $this->db->insert_id();
	}

	

	public function GetDetalle($idcabecera = '', $iddetalle = '')
	{
		$this->db->select('
			s.idsolicitud_detalle, 
			p.nombre, 
			s.cantidad, 
			s.preciounitario, 
			s.subtotal, 
			s.id_solicitud_cabecera'
			);
		$this->db->from('solicitud_detalle s');
		$this->db->join('producto p', 's.id_producto = p.idproducto', 'INNER');
		if ($iddetalle == '' && $idcabecera == '')
		{
			$consulta = $this->db->get();
			return $consulta->result();
		}
		if ($iddetalle != '' && $idcabecera == '') 
		{
			$this->db->where('id_solicitud_detalle', $iddetalle);
			$consulta = $this->db->get();
			return $consulta->row();
		}
		if ($iddetalle == '' && $idcabecera != '') 
		{
			$this->db->where('id_solicitud_cabecera', $idcabecera);
			$consulta = $this->db->get();
			return $consulta->result();
		}
	}

	public function GetObservaciones($iddetalle = NULL, $idcabecera = NULL)
	{
		if (is_null($iddetalle) && is_null($idcabecera)) 
		{
			$consulta = $this->db->get('solicitud_observacion');
			return $consulta->result();
		}
		$query = "SELECT 
					so.idsolicitud_observacion AS idsolicitud_observacion, 
					so.observacion AS observacion, 
					so.fecha AS fecha,
					CONCAT_WS(' ', u.nombres, u.apellidoPaterno, u.apellidoMaterno) AS nombre,
					c.nombre AS cargo,
					sd.idsolicitud_detalle
				FROM solicitud_observacion so
				INNER JOIN usuario u ON u.idusuario = so.id_usuario
				INNER JOIN cargo c ON c.idcargo = u.id_cargo
				INNER JOIN solicitud_detalle sd ON sd.idsolicitud_detalle = so.id_solicitud_detalle
				INNER JOIN solicitud_cabecera sc ON sc.idsolicitud_cabecera = sd.id_solicitud_cabecera
				WHERE sd.idsolicitud_detalle = $iddetalle
					AND sc.idsolicitud_cabecera = $idcabecera";
		$consulta = $this->db->query($query);
		return $consulta->result();
	}

	public function GetSolicitudObservacionByDetalleAndCabecera($id_solicitud_cabecera, $id_solicitud_detalle)
	{
		
		$result = $this->db->query($query);
		if ($result->num_rows()>=1) 
		{
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function GetDetalleSolicitud($idsolicitud)
	{
		$query = "SELECT * FROM solicitud_detalle WHERE id_solicitud =".$idsolicitud.";";		
		$result = $this->db->query($query);
		if ($result->num_rows()>=1) 
		{
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function SetSolicitudCabecera($user)
	{
		$data = array(
			'fecha' 		=> date('Y-m-d H:i:s'),
			'id_proveedor'	=> $this->input->post('proveedor'),
			'id_usuario'	=> $user
		 );
		$this->db->insert('solicitud_cabecera', $data);
		return  $this->db->insert_id();		
	}

	public function SetSolicitudDetalle($producto, $cantidad, $precio, $subtotal, $idsolicitud)
	{
		$data = array(
			'id_producto' 			=> $producto,
			'cantidad'				=> $cantidad,
			'preciounitario'		=> $precio,
			'subtotal'				=> $subtotal,
			'id_solicitud_cabecera'	=> $idsolicitud
			);
		$this->db->insert('solicitud_detalle', $data);

		return $this->db->insert_id();
	}

	public function SetSolicitudObservacion($observacion, $user, $idsolicitud_detalle)
	{
		$data = array(
			'observacion' 			=> $observacion,
			'fecha'					=> date('Y-m-d H:i:s'),
			'id_usuario'			=> $user,
			'id_solicitud_detalle' 	=> $idsolicitud_detalle
			);
		$this->db->insert('solicitud_observacion', $data);
		return $this->db->insert_id();
	}

	public function SetSolicitudCabeceraTotal($user, $idsolicitud, $total)
	{
		$data = array(
			'total' => $total,
			'estado'	=> 'Pendiente' 
			);
		$this->db->where('idsolicitud_cabecera', $idsolicitud);
		$this->db->update('solicitud_cabecera', $data);
	}

	public function DescCfgSolicitud($idarea)
	{
		$query = "UPDATE area SET nroRestanteSolicitud = nroRestanteSolicitud - 1 WHERE idarea = $idarea";
		$consulta = $this->db->query($query);
	}

	public function GetFlujo($idarea, $trabajo)
	{
		$query = "SELECT f.orden
			FROM flujo f
			INNER JOIN proceso p ON p.idproceso = f.id_proceso
			INNER JOIN solicitud_cabecera sc ON sc.id_proceso = p.idproceso
			INNER JOIN campo c ON c.idcampo = f.id_campo
			WHERE c.id_areaejemplo = Almacen AND sc.idsolicitud_cabecera = '$trabajo'";
		echo $query;
	}
}

/* End of file pedido.php */
/* Location: ./application/models/pedido.php */