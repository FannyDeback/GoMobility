<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->model('m_actors');
	}

	public function index()
	{
		$data['act'] = $this->m_actors->actors_count();
		$data['exp'] = $this->m_actors->last_exp();
		$data['best'] = $this->m_actors->best_actor()[0];

		$this->load->view('v_header');
		$this->load->view('v_home',$data);
		$this->load->view('v_footer');
	}

	public function lastexp()
	{
		$this->load->view('v_header');
		$this->load->view('v_lastexp');
		$this->load->view('v_footer');
	}

	public function jeu()
	{
		$this->load->view('v_header');
		$this->load->view('v_jeu');
		$this->load->view('v_footer');
	}
}
