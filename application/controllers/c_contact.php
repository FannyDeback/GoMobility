<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_contact extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('email');

	}
	// envoyer un mail avec gmail
	public function index(){

		$validation = array(
			array(
				'field' => 'nom',
				'label' => 'Nom',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email|xss_clean'
			),
			array(
				'field' => 'message',
				'label' => 'Type de transport',
				'rules' => 'trim|required'
			)	
	}
}
