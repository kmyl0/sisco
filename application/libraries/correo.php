<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correo
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function SendEmail($destinatario, $mensaje)
	{
		$this->ci->load->library("email");

		//CONFIGURACION DEL EMAIL
		$configEmail = array(
			'protocol' 		=> 'smtp',
			'smtp_host' 	=> 'smtpout.secureserver.net',
			'smtp_port' 	=>  80,
			'smtp_user' 	=> 'pagina@mugebusch.org',
			'smtp_pass' 	=> 'bolivia',
			'mailtype' 		=> 'html',
			'charset' 		=> 'utf-8',
			'newline' 		=> "\r\n"
		);
		$this->ci->email->initialize($configEmail);

		//PARAMETROS DE ENVIO
		$this->ci->email->from('pagina@mugebusch.org', "Sistema de control y seguimiento documentario");
		$this->ci->email->to($destinatario);
		$this->ci->email->subject('Usted tiene un documento por responder');
		$this->ci->email->message($mensaje);
		$this->ci->email->send();

		//CON ESTO SE PUEDE VER LOS RESULTADOS
		var_dump($this->ci->email->print_debugger());
	}
}

/* End of file correo.php */
/* Location: ./application/libraries/correo.php */
