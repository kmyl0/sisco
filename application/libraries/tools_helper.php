<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_helper
{
	protected $ci;
	public $UserName;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function GetUserContext($data)
	{
		$data['UserName'] = $data->nombres.' '.$data->apellidoPaterno.' '.$data->apellidoMaterno;
	}
}

/* End of file tools_helper.php */
/* Location: ./application/libraries/tools_helper.php */
