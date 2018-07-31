<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	protected $ci;

	public function __construct() 
	{
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }

    public function IfAccessTo($access, $config)
    {
    	if (!$this->Place($access, $config)) 
    	{
    		redirect(base_url().'home/forbidden');
            
    	}
    }

    public function Place($place, $config = '')
    {
    	switch ($place) {
            case 'administrador_proveedor':
            case 'administrador_categoria':
            case 'administrador_producto':
            case 'administrador_area':
            case 'administrator_user':
            case 'administrator_rrhh':
    			if ($this->CI->session->userdata('rol') == '1')
    				return TRUE;
    			else
    				return FALSE;
    			break;
            case 'user_nuevo_informe':
            case 'user_access_ruta': 
                if ($config == '1') {
                    return TRUE;
                } else {
                    return FALSE;
                }
                break;
    	}
    }

    public function LoadLogin($layer, $data = '')
    {
        $this->CI->load->view('template/header');
        $this->CI->load->view($layer, $data);        
        $this->CI->load->view('template/pie');
    }

    public function LoadLayout($layer, $data = '')
    {
        $this->CI->load->view('template/header');
        switch ($this->CI->session->userdata('rol'))
        {
            case '2':
                $this->CI->load->view('template/nav_user', $data);
                break;
            case '1':            
                $this->CI->load->view('template/nav_administrator');                
                break;
            case '3':
                $this->CI->load->view('template/menu/secretaria');
                break;
            default:
                $this->CI->load->view('template/nav_visitor');
                break;
        }
        $this->CI->load->view($layer, $data);        
        $this->CI->load->view('template/footer');
    }

    public function LoadParcial($layer, $data = '')
    {
        $this->CI->load->view($layer, $data);
    }

	public function authentication($logged_in, $nivel)
	{
		if ($logged_in) 
		{
			switch ($nivel) 
			{
				case '0':
					redirect(base_url().'user');
					break;
				case '1':
					redirect(base_url().'administrator');
					break;
			}
		}
	}
}

/* End of file authorization.php */
/* Location: ./application/libraries/authorization.php */
