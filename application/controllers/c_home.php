<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//contrôleur pour charger les vues de la home
class c_home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('url'));
		$this->load->model('m_actu');
	}

	public function index()
	{
		$exp = $this->m_actors->last_exp();
		$data = array();
		if ($exp != null)
		{
			$data['exp'] = $exp[0];
		}

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

	public function contact()
	{
		$this->layout->view('v_contact');	
	}

	public function appli()
	{
		$this->layout->view('v_appli');	
	}

	public function projet()
	{
		$this->layout->view('v_projet');
	}
}
