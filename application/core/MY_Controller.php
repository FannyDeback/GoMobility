<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	private $view = '';
	private $data = '';

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->model('m_actors');
		$this->load->helper('assets');
		$this->load->view('v_header');

		if ($this->view != '' && $this->data != '')
			$this->load->view($this->view, $this->data);

		$this->load->view('v_footer');
	}

	protected function setView($view, $data=array())
	{
		$this->view = $view;
		$this->data = $data;
	}
}
