<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	protected $admin_control = "#^admin/*#";

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');

		$this->checkAuth();
	}

	// Vérifie les authorisations
	private function checkAuth()
	{
		// Si la personne n'est pas connecté et qu'elle essaye d'aller sur l'admin
		if (!$this->session->userdata('id_user') && preg_match($this->admin_control, $this->uri->uri_string()))
			//in_array($this->uri->uri_string(), $this->admin_control))
			$this->redirectAuth();
	}

	// Redirige les requêtes non authorisées
	private function redirectAuth()
	{
		if ( $this->input->is_ajax_request() )
		{
			$response = array('status' => 'disconnected');
			echo (json_encode($response));
			die();
		}
		else {
			redirect('admin/index');
		}
	}
}
