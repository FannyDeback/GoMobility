<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$data['exp'] = $this->m_actors->last_exp()[0];
		$this->layout->view('v_home', $data);
	}

	public function jeu()
	{
		$this->layout->view('v_jeu');
	}

	public function mentions()
	{
		$this->layout->view('v_mentionslegales');
	}
}
