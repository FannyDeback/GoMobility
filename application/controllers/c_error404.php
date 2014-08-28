<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_error404 extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$this->output->set_status_header('404');
		if($this->uri->segment(1) == 'admin')
		{
			$this->layout->viewAdmin('v_error404');
		}
		else
		{
			$this->layout->view('v_error404');
		}
	}
}