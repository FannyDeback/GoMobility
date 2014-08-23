<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $output = '';

	
	public function __construct()
	{
		$this->CI = get_instance();
	}

	public function view($name, $data = array())
	{
		$this->output .= $this->CI->load->view($name, $data, true);
		$this->CI->load->view('index.php', array('output' => $this->output));
	}

	public function views($name, $data = array())
	{
		$this->output .= $this->CI->load->view($name, $data, true);
		return $this;
	}
}
