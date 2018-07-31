<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dms extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) redirect('home/login');

		$this->load->model('rrhh_model');
        $this->load->model('dms_model');
        $this->load->library('pdf');
        $this->load->library('correo');
        $this->load->library('form_validation');
        $this->folder = 'fileupload/informe/';
    }

    public function nuevoRuta()
	{
		//DATOS INICIALES
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));
		$configuration = $this->dms_model->GetConfiguration($this->session->userdata('idusuario'));

		//VERIFICACION DE ACCESO
		$this->auth->IfAccessTo('user_nuevo_informe', $configuration->cfgNuevoInforme);

		//CARGAR LIBRERIA DE VALIDACION
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fecha', 'fecha');
		$this->form_validation->set_rules('remitente', 'Remitente', 'required');
		$this->form_validation->set_rules('destinatario', 'Destinatario', 'required');
		$this->form_validation->set_rules('referencia', 'Referencia', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('proveido', 'Proveido', 'required|min_length[5]|max_length[500]');
		$this->form_validation->set_rules('adjunto_externo', 'Archivo');

		//COMPROBAMOS QUE LA VALIDACION NO ESTA EN EJECUCION
		if ($this->form_validation->run() === FALSE)
		{
			//CARGAMOS RUTAS TIPO
			$data['RutasTipos']		= $this->dms_model->GetRutaTipo();
			//CARGAMOS LOS CITES QUE EL USUARIO PUEDA ESCOGER
			$data['Cites'] 			= $this->dms_model->GetCiteByUsuario($this->session->userdata('idusuario'));
			//TIPOS DE DOCUMENTOS
			$data['TipoDocumentos'] = $this->dms_model->GetTipoDocumentos();
			//CARGAMOS DATOS DEL REMITENTE
			$data['Remitente']		= $userData;
			//CARGAMOS TODOS LOS DESTINATARIOS
			$data['Destinatarios']	= $this->dms_model->GetDestinatarios();
			//CARGAMOS EL NUMERO DE LA NUEVA POSIBLE RUTA
			$data['id_ruta']		= $this->dms_model->GetNewRuta();
			//EJECUTAMOS LA VISTA
			$this->auth->LoadLayout('dms/operacion/nuevoRuta', $data);
		}
		else
		{
			//CARGAMOS LA NUEVA RUTA
			$idruta	= $this->dms_model->AddRuta(
				$userData->idusuario,
				$userData->idarea,
				$this->input->post('referencia'),
				$this->input->post('rutaTipo')
				);

			//COMPROBAMOS SI SE ENVIO EL DOCUMENTO DE ARCHIVO
			$adjuntoexterno = $this->input->post('sienviaradjunto') == "TRUE" ? $this->SubirDocumento($this->GetNameFile($this->userData)) : '';

			//CARGAMOS EL NUEVO PROVEIDO
		    $this->dms_model->AddProveido(
		    	$userData->idusuario,
		    	NULL,
		    	$this->input->post('tipoDocumento'),
		    	$this->input->post('destinatario'),
		    	$this->input->post('proveido'),
		    	1,
		    	NULL,
		    	$adjuntoexterno,
		    	$idruta
		    	);

		     //CARGAMOS DATOS PARA EL CORREO ELECTRONICO
		    if ($this->input->post('siEnviarCorreo') == "TRUE")
	    	{
	    		//CARGAMOS DATOS PARA EL CORREO ELECTRONICO
				$data = array(
			    	'idruta' 			=> $idruta,
			    	'nombres' 			=> $userData->nombres,
			    	'apellidoPaterno' 	=> $userData->apellidoPaterno,
			    	'apellidoMaterno' 	=> $userData->apellidoMaterno,
			    	'referencia' 	 	=> $this->input->post('referencia'),
			    	'asunto'		  	=> $this->input->post('proveido'),
			    	'tipoAsunto'	  	=> 'EMITIR DOCUMENTACION',
			    	'enlace'		  	=> base_url().'dms/lista/pendientes'
			    );
			    $html = $this->load->view('dms/transaccion/email', $data, TRUE);

				//ENVIAMOS EL CORREO
			   	// $this->correo->SendEmail($this->rrhh_model->GetData($this->input->post('destinatario'))->email, $html);
	    	}

			//REDIRECCIONAMIENTO
			redirect(base_url().'dms/view/'.$idruta);
		}
	}

    public function nuevo()
    {
    	//CARGAMOS DATOS INICIALES
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));

		//CARGAR LIBRERIA DE VALIDACION
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('rutaTipo', 'Tipo de Ruta', 'required');
		$this->form_validation->set_rules('cite', 'Cite', 'required');
		$this->form_validation->set_rules('fecha', 'fecha');
		$this->form_validation->set_rules('tipoDocumento', 'Tipo de documento', 'required');
		$this->form_validation->set_rules('remitente', 'Remitente', 'required');
		$this->form_validation->set_rules('destinatario', 'Destinatario', 'required');
		$this->form_validation->set_rules('conCopia[]', 'Con Copia');
		$this->form_validation->set_rules('referencia', 'Referencia', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('proveido', 'Proveido', 'required|min_length[5]|max_length[500]');
		$this->form_validation->set_rules('adjunto_externo', 'Archivo');

		//COMPROBAMOS QUE LA VALIDACION NO ESTA EN EJECUCION
		if ($this->form_validation->run() === FALSE)
		{
			//CARGAMOS RUTAS TIPO
			$data['RutasTipos']		= $this->dms_model->GetRutaTipo();
			//CARGAMOS LOS CITES QUE EL USUARIO PUEDA ESCOGER
			$data['Cites'] 			= $this->dms_model->GetCiteByUsuario($this->session->userdata('idusuario'));
			//TIPOS DE DOCUMENTOS
			$data['TipoDocumentos'] = $this->dms_model->GetTipoDocumentos();
			//CARGAMOS DATOS DEL REMITENTE
			$data['Remitente']		= $userData;
			//CARGAMOS TODOS LOS DESTINATARIOS
			$data['Destinatarios']	= $this->dms_model->GetDestinatarios();
			//CARGAMOS EL NUMERO DE LA NUEVA POSIBLE RUTA
			$data['id_ruta']		= $this->dms_model->GetNewRuta();

			//EJECUTAMOS LA VISTA
			$this->auth->LoadLayout('dms/operacion/nuevo', $data);
		}
		else
		{
			//CARGAMOS LA NUEVA RUTA
			$idruta	= $this->dms_model->AddRuta(
				$userData->idusuario,
				$userData->idarea,
				$this->input->post('referencia'),
				$this->input->post('rutaTipo')
				);

			//COMPROBAMOS SI SE ENVIO EL DOCUMENTO DE ARCHIVO
			$adjuntoexterno = $this->input->post('sienviaradjunto') == "TRUE" ? $this->SubirDocumento($this->GetNameFile($this->userData)) : '';

			$cite = $this->dms_model->GetCiteByArea($this->input->post('cite'));
			$cite = $cite->sigla.' - '. $cite->nroinforme.'/'.date('Y');

			//CARGAMOS EL NUEVO PROVEIDO
		    $this->dms_model->AddProveido(
		    	$userData->idusuario,
		    	$cite,
		    	$this->input->post('tipoDocumento'),
		    	$this->input->post('destinatario'),
		    	$this->input->post('proveido'),
		    	1,
		    	NULL,
		    	$adjuntoexterno,
		    	$idruta
		    	);

			//COMPROBAMOS SI HAY QUE ENVIAR CON COPIA
			if (!is_null($this->input->post('conCopia')))
			{
				foreach ($this->input->post('conCopia') as $destinatario)
				{
					$this->dms_model->AddProveido(
				    	$userData->idusuario,
				    	$cite,
				    	$this->input->post('tipoDocumento'),
				    	$destinatario,
				    	$this->input->post('proveido'),
				    	1,
				    	4,
				    	$adjuntoexterno,
				    	$idruta
				    	);
				}
			}

			//NUEVO CITE
			$this->dms_model->UpdateCite($this->input->post('cite'));

		    //CARGAMOS DATOS PARA EL CORREO ELECTRONICO
		    if ($this->input->post('siEnviarCorreo') == "TRUE")
	    	{
	    		//CARGAMOS DATOS PARA EL CORREO ELECTRONICO
				$data = array(
			    	'idruta' 			=> $idruta,
			    	'nombres' 			=> $userData->nombres,
			    	'apellidoPaterno' 	=> $userData->apellidoPaterno,
			    	'apellidoMaterno' 	=> $userData->apellidoMaterno,
			    	'referencia' 	 	=> $this->input->post('referencia'),
			    	'asunto'		  	=> $this->input->post('proveido'),
			    	'tipoAsunto'	  	=> 'EMITIR DOCUMENTACION',
			    	'enlace'		  	=> base_url().'dms/lista/pendientes'
			    );
			    $html = $this->load->view('dms/transaccion/email', $data, TRUE);

				//ENVIAMOS EL CORREO
			   	// $this->correo->SendEmail($this->rrhh_model->GetData($this->input->post('destinatario'))->email, $html);
	    	}

			//REDIRECCIONAMIENTO
			redirect(base_url().'dms/view/'.$idruta);
		}
    }

	public function index()
	{
		//CARGAR PROVEIDOS
		$data['Proveidos'] = $this->dms_model->GetRecepcion($this->session->userdata('idusuario'));

		//CARGAR VISTA
		$this->auth->LoadLayout('dms/lista/recepcion', $data);
	}

	public function aceptar()
	{
		//CARGAMOS DATOS DEL USUARIO PARA ACTUALIZAR SEGUIMIENTO
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));

		//ACTUALIZAR EL PROVEIDO
		$data = array(
			'id_estado_proveido' => 2,
			'fecha_aceptado'	 => date('Y-m-d H:i:s')
			);
		$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

		//ACTUALIZAR LA RUTA
		$data = array(
			'fecha_procesada' 	=> date('Y-m-d H:i:s'),
			'id_area'			=> $userData->idarea,
			'id_estado_ruta' 	=> 2,
			'id_estado_proveido'=> 2,
			);
		$this->dms_model->UpdateRuta($data, $this->input->post('id_ruta'));

		//REDIRECCIONAMIENTO
		redirect(base_url().'dms/lista/pendientes');
	}

	public function pendientes()
	{
		//CARGAR PROVEIDOS
		$data['Proveidos'] = $this->dms_model->GetProveidos($this->session->userdata('idusuario'));

		//CARGAR VISTA
		$this->auth->LoadLayout('dms/lista/pendientes', $data);
	}
	public function npendientes()
	{
		//CARGAR PROVEIDOS
		$data['ProveidosN'] = $this->dms_model->GetProveidosN($this->session->userdata('idusuario'));

		//CARGAR VISTA
		$this->auth->LoadLayout('dms/lista/pendientesN', $data);
	}

	public function derivar()
	{
		//CARGAMOS DATOS INICIALES
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));

		//CARGAR LIBRERIA DE VALIDACION
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fecha', 'fecha');
		$this->form_validation->set_rules('remitente', 'Remitente', 'required');
		$this->form_validation->set_rules('destinatario', 'Destinatario', 'required');
		$this->form_validation->set_rules('referencia', 'Referencia', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('proveido', 'Proveido', 'required|min_length[5]|max_length[500]');

		if ($this->form_validation->run() === FALSE)
		{
			//ACTUALIZAR EL PROVEIDO
			$data = array(
				'id_estado_proveido' => 3,
				'fecha_procesando'	 => date('Y-m-d H:i:s')
				);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//ACTUALIZAR LA RUTA
			$data = array(
				'id_area'			=> $userData->idarea,
				'id_estado_proveido'=> 3,
				);
			$this->dms_model->UpdateRuta($data, $this->input->post('id_ruta'));

			//CARGAMOS EL REMITENTE
			$data['Remitente']		= $userData;
			//CARGAMOS LOS DESTINATARIOS
			$data['Destinatarios']	= $this->dms_model->GetDestinatarios();
			//CARGAMOS LOS DATOS PARA LA VISTA
			$data['idproveido']		= $this->input->post('idproveido'); //PROVEIDO COMO DATO OCULTO
			$data['id_ruta']		= $this->input->post('id_ruta');	//RUTA COMO DATO OCULTO
			$data['referencia']		= $this->input->post('referencia');//REFERENCIA COMO DATO OCULTO SIN EFECTO

			//CARGAMOS LA VISTA
			$this->auth->LoadLayout('dms/operacion/derivar', $data);
		}
		else
		{
			//ACTUALIZAR EL PROVEIDO
			$data = array('id_proceso_proveido' => 1);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//CARGAMOS NUEVO PROVEIDO DE PROCESO DERIVACION
			$this->dms_model->AddProveido(
		    	$userData->idusuario,
		    	'',
		    	NULL,
		    	$this->input->post('destinatario'),
		    	$this->input->post('proveido'),
		    	1,
		    	NULL,
		    	'',
		    	$this->input->post('id_ruta')
		    	);

	    	if ($this->input->post('siEnviarCorreo') == "TRUE")
	    	{
	    		//CARGAMOS DATOS PARA EL CORREO ELECTRONICO
				$data = array(
			    	'idruta' 			=> $this->input->post('id_ruta'),
			    	'nombres' 			=> $userData->nombres,
			    	'apellidoPaterno' 	=> $userData->apellidoPaterno,
			    	'apellidoMaterno' 	=> $userData->apellidoMaterno,
			    	'referencia' 	 	=> $this->input->post('referencia'),
			    	'asunto'		  	=> $this->input->post('asunto'),
			    	'tipoAsunto'	  	=> 'EMITIR DOCUMENTACION',
			    	'enlace'		  	=> base_url().'dms/lista/pendientes'
			    );
			    $html = $this->load->view('dms/transaccion/email', $data, TRUE);

				//ENVIAMOS EL CORREO
			   	//$this->correo->SendEmail($this->rrhh_model->GetData($this->input->post('destinatario'))->email, $html);
	    	}

	    	//ACTUALIZAR EL PROVEIDO
			$data = array(
				'id_estado_proveido' => 4,
				'fecha_concluido'	 => date('Y-m-d H:i:s')
				);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//ACTUALIZAR LA RUTA
			$data = array(
				'id_area'			=> $userData->idarea,
				'id_estado_proveido'=> 1
				);
			$this->dms_model->UpdateRuta($data, $this->input->post('id_ruta'));

		    //REDIRECCIONAMIENTO
			redirect(base_url().'dms/view/'.$this->input->post('id_ruta'));
		}
	}

	public function emitirDocumento()
	{
		//CARGAMOS DATOS INICIALES
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));

		//CARGAMOS LA LIBRERIA DE FORMULARIO
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('cite', 'Cite', 'required');
		$this->form_validation->set_rules('fecha', 'fecha');
		$this->form_validation->set_rules('tipoDocumento', 'Tipo de documento', 'required');
		$this->form_validation->set_rules('remitente', 'Remitente', 'required');
		$this->form_validation->set_rules('destinatario', 'Destinatario', 'required');
		$this->form_validation->set_rules('conCopia[]', 'Con Copia');
		$this->form_validation->set_rules('referencia', 'Referencia', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('proveido', 'Proveido', 'required|min_length[5]|max_length[500]');
		$this->form_validation->set_rules('adjunto_externo', 'Archivo');

		//COMPROBAMOS QUE EL FORMULARIO NO HA VALIDADO
		if ($this->form_validation->run() === FALSE)
		{
			//ACTUALIZAR EL PROVEIDO
			$data = array(
				'id_estado_proveido' => 3,
				'fecha_procesando'	 => date('Y-m-d H:i:s')
				);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//ACTUALIZAR LA RUTA
			$data = array(
				'id_area'			=> $userData->idarea,
				'id_estado_proveido'=> 3,
				);
			$this->dms_model->UpdateRuta($data, $this->input->post('id_ruta'));

			//CARGAMOS RUTAS TIPO
			$data['RutasTipos']		= $this->dms_model->GetRutaTipo();
			//CARGAMOS LOS CITES QUE EL USUARIO PUEDA ESCOGER
			$data['Cites'] 			= $this->dms_model->GetCiteByUsuario($this->session->userdata('idusuario'));
			//TIPOS DE DOCUMENTOS
			$data['TipoDocumentos'] = $this->dms_model->GetTipoDocumentos();

			//CARGAMOS EL REMITENTE
			$data['Remitente']		= $userData;
			//CARGAMOS LOS DESTINATARIOS
			$data['Destinatarios']	= $this->dms_model->GetDestinatarios();

			//CARGAMOS LAS DEPENDENCIAS
			$data['idproveido']		= $this->input->post('idproveido'); //PROVEIDO COMO DATO OCULTO
			$data['id_ruta']		= $this->input->post('id_ruta');	//RUTA COMO DATO OCULTO
			$data['referencia']		= $this->input->post('referencia');

			//CARGAMOS LA VISTA
			$this->auth->LoadLayout('dms/operacion/emitir', $data);
		}
		else
		{
			//ACTUALIZAR EL PROVEIDO
			$data = array('id_proceso_proveido' => 2);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//CARGAMOS EL ARCHIVO
			$adjuntoexterno = $this->input->post('sienviaradjunto') == "TRUE" ? $this->SubirDocumento($this->GetNameFile($userData)) : '';

			$cite = $this->dms_model->GetCiteByArea($this->input->post('cite'));
			$cite = $cite->sigla.' - '. $cite->nroinforme;

			//CARGAMOS EL NUEVO PROVEIDO
		    $this->dms_model->AddProveido(
		    	$userData->idusuario,
		    	$cite,
		    	$this->input->post('tipoDocumento'),
		    	$this->input->post('destinatario'),
		    	$this->input->post('proveido'),
		    	1,
		    	NULL,
		    	$adjuntoexterno,
		    	$this->input->post('id_ruta')
		    	);

			//COMPROBAMOS SI HAY QUE ENVIAR CON COPIA
			if (!is_null($this->input->post('conCopia')))
			{
				foreach ($this->input->post('conCopia') as $destinatario)
				{
					$this->dms_model->AddProveido(
				    	$userData->idusuario,
				    	$cite,
				    	$this->input->post('tipoDocumento'),
				    	$destinatario,
				    	$this->input->post('proveido'),
				    	1,
				    	4,
				    	$adjuntoexterno,
				    	$this->input->post('id_ruta')
				    	);
				}
			}

	    	//NUEVO CITE
			$this->dms_model->UpdateCite($this->input->post('cite'));

	    	if ($this->input->post('siEnviarCorreo') == "TRUE")
	    	{
	    		//CARGAMOS DATOS PARA EL CORREO ELECTRONICO
				$data = array(
			    	'idruta' 			=> $this->input->post('id_ruta'),
			    	'nombres' 			=> $userData->nombres,
			    	'apellidoPaterno' 	=> $userData->apellidoPaterno,
			    	'apellidoMaterno' 	=> $userData->apellidoMaterno,
			    	'referencia' 	 	=> $this->input->post('referencia'),
			    	'asunto'		  	=> $this->input->post('proveido'),
			    	'tipoAsunto'	  	=> 'EMITIR DOCUMENTACION',
			    	'enlace'		  	=> base_url().'dms/lista/pendientes'
			    );
			    $html = $this->load->view('dms/transaccion/email', $data, TRUE);

				//ENVIAMOS EL CORREO
			   	// $this->correo->SendEmail($this->rrhh_model->GetData($this->input->post('destinatario'))->email, $html);
	    	}

	    	//ACTUALIZAR EL PROVEIDO
			$data = array(
				'id_estado_proveido' => 4,
				'fecha_concluido'	 => date('Y-m-d H:i:s')
				);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//ACTUALIZAR LA RUTA
			$data = array(
				'id_area'			=> $userData->idarea,
				'id_estado_proveido'=> 1
				);
			$this->dms_model->UpdateRuta($data, $this->input->post('id_ruta'));

			//REDIRECCIONAMIENTO
			redirect(base_url().'dms/view/'.$this->input->post('id_ruta'));
		}
	}

	public function archivar()
	{
		//CARGAMOS DATOS INICIALES
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));

		//CARGAR LIBRERIA DE VALIDACION
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fecha', 'fecha');
		$this->form_validation->set_rules('remitente', 'Remitente', 'required');
		$this->form_validation->set_rules('destinatario', 'Destinatario', 'required');
		$this->form_validation->set_rules('referencia', 'Referencia', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('proveido', 'Proveido', 'required|min_length[5]|max_length[500]');

		if ($this->form_validation->run() === FALSE)
		{
			//ACTUALIZAR EL PROVEIDO
			$data = array(
				'id_estado_proveido' => 3,
				'fecha_procesando'	 => date('Y-m-d H:i:s')
				);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//ACTUALIZAR LA RUTA
			$data = array(
				'id_area'			=> $userData->idarea,
				'id_estado_proveido'=> 3,
				);
			$this->dms_model->UpdateRuta($data, $this->input->post('id_ruta'));

			//CARGAMOS EL REMITENTE
			$data['Remitente']		= $userData;
			$data['Destinatario']	= $userData;
			//CARGAMOS LAS DEPENDENCIAS
			$data['idproveido']		= $this->input->post('idproveido'); //PROVEIDO COMO DATO OCULTO
			$data['id_ruta']		= $this->input->post('id_ruta');	//RUTA COMO DATO OCULTO
			$data['referencia']		= $this->input->post('referencia');

			//CARGAMOS LA VISTA
			$this->auth->LoadLayout('dms/operacion/archivar', $data);
		}
		else
		{
			//ACTUALIZAR EL PROVEIDO
			$data = array('id_proceso_proveido' => 3);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//CARGAMOS EL PROVEIDO
	    	$this->dms_model->AddProveido(
		    	$userData->idusuario,
		    	NULL,
		    	NULL,
		    	$this->input->post('destinatario'),
		    	$this->input->post('proveido'),
		    	1,
		    	3,
		    	'',
		    	$this->input->post('id_ruta')
		    	);

	    	//ACTUALIZAR EL PROVEIDO
			$data = array(
				'id_estado_proveido' => 4,
				'fecha_concluido'	 => date('Y-m-d H:i:s')
				);
			$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

			//ACTUALIZAR LA RUTA
			$data = array(
				'id_area'			=> $userData->idarea,
				'id_estado_proveido'=> 4
				);
			$this->dms_model->UpdateRuta($data, $this->input->post('id_ruta'));

			//REDIRECCIONAMIENTO
			redirect(base_url().'dms/view/'.$this->input->post('id_ruta'));
		}
	}

	public function proveidos()
	{
		//CARGAR PROVEIDOS
		$data['Proveidos'] = $this->dms_model->GetProveidosEnviados($this->session->userdata('idusuario'));

		//CARGAR VISTA
		$this->auth->LoadLayout('dms/lista/proveidos', $data);
	}

	public function archivados()
	{
		//CARGAR ARCHIVADOS POR EL USUARIO
		$data['Archivados'] = $this->dms_model->GetArchivados($this->session->userdata('idusuario'));

		//CARGAR VISTA
		$this->auth->LoadLayout('dms/lista/archivados', $data);
	}

	public function recuperar()
	{
		//CARGAMOS DATOS DEL USUARIO PARA ACTUALIZAR SEGUIMIENTO
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));

		//ACTUALIZAR EL PROVEIDO
		$data = array(
			'id_estado_proveido' 	=> 2,
			'id_proceso_proveido' 	=> NULL,
			'fecha_aceptado'	 	=> date('Y-m-d H:i:s')
			);
		$this->dms_model->UpdateProveido($data, $this->input->post('idproveido'));

		//ACTUALIZAR LA RUTA
		$data = array(
			'fecha_procesada' 	=> date('Y-m-d H:i:s'),
			'id_area'			=> $userData->idarea,
			'id_estado_ruta' 	=> 2,
			'id_estado_proveido'=> 2,
			);
		$this->dms_model->UpdateRuta($data, $this->input->post('id_ruta'));

		//REDIRECCIONAMIENTO
		redirect(base_url().'dms/lista/pendientes');
	}

	public function ruta()
	{
		//CARGAR RUTAS
		$data['Rutas'] 	= $this->dms_model->GetRutas($this->session->userdata('idusuario'));

		//CARGAR VISTAS
		$this->auth->LoadLayout('dms/lista/ruta', $data);
	}

	public function view($idruta)
	{
		$data['procedencia'] = $this->dms_model->GetProcedencia($idruta);
		$data['rutas'] = $this->dms_model->GetRutaById($idruta);
		$data['avisados'] = $this->dms_model->GetAvisos($idruta);
		$this->auth->LoadLayout("dms/lista/preview", $data);
	}

	public function pdf($idruta)
	{
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));
		$data['UserName'] = $userData->nombres.' '.$userData->apellidoPaterno.' '.$userData->apellidoMaterno;
		$data['procedencia'] = $this->dms_model->GetProcedencia($idruta);
		$data['rutas'] = $this->dms_model->GetRutaById($idruta);
		$data['avisados'] = $this->dms_model->GetAvisos($idruta);
		$html = $this->load->view('dms/transaccion/pdf', $data, TRUE);

	 	$pageLayout = array(2159, 2794);
	 	$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('MUGEBUSCH');
	    $pdf->SetTitle('RUTA');
	    $pdf->SetSubject('DOCUMENTOS DE RUTA');
	    $pdf->SetKeywords('RUTA, INFORME');

	    $pdf->SetHeaderData("logomugebusch.png", PDF_HEADER_LOGO_WIDTH);
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	    if (@file_exists(dirname(__FILE__).'/lang/eng.php'))
	    {
	        require_once(dirname(__FILE__).'/lang/eng.php');
	        $pdf->setLanguageArray($l);
	    }

	    $pdf->setFontSubsetting(true);
	    $pdf->SetFont('helvetica', '', 10);
	    $pdf->AddPage();

		$pdf->writeHTML("$html", true, false);

	    $adjuntodocumento = $this->GetNameFile($userData).".pdf";
	    $pdf->Output($adjuntodocumento,"I");
	}

	public function viewinforme($name)
	{
		$userData = $this->rrhh_model->GetData($this->session->userdata('idusuario'));
		$data['UserName'] = $userData->nombres.' '.$userData->apellidoPaterno.' '.$userData->apellidoMaterno;
		$data = file_get_contents($this->folder.$name);
        force_download($name, $data);
	}

	private function SubirDocumento($nombreDocumento)
	{
		$config['upload_path'] = './fileupload/informe/';
		$config['allowed_types'] = 'pdf|PDF|doc|DOC|docx|DOCX|xls|XLS|xlsx|XLSX|ppt|PPT|pptx|PPTX';
		$config['max_size']  = '1000000';
		$config['file_name'] = $nombreDocumento;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('adjunto_externo'))
		{
		    return $this->upload->data('file_name');
		}

		return '';
	}

	private function GetNameFile($usuario)
	{
		$sigla 			= str_replace(" ", "_", $usuario->sigla);
		$fecha			= date('Y').date('m').date('d');
		$inicialNombre 	= $usuario->nombres[0];
		$iniciaPaterno 	= $usuario->apellidoPaterno[0];
		$iniciaMaterno 	= ($usuario->apellidoMaterno[0] =! NULL) ? $usuario->apellidoMaterno[0] : '';
		$nombreArchivo	= $sigla."_".$fecha."_".strtoupper($inicialNombre).strtoupper($iniciaPaterno).strtoupper($iniciaMaterno);
		return $nombreArchivo;
	}
}
/* End of file informe.php */
/* Location: ./application/controllers/informe.php */
