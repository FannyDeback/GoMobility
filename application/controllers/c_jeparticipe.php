<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_jeparticipe extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('m_actors');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}

	public function jeparticipe()
	{
		$this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('mail', 'mail', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('mail', 'mail', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('mail', 'mail', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[5]|max_length[10]');/*
		$this->form_validation->set_rules('passconf', 'Confirmation du mot de passe', 'required|min_length[5]|max_length[10]');*/
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_message('required','Ce champ est requis');

		if ($this->form_validation->run() == TRUE)
		{
			$this->model_exercice5->inscription($this->input->post('mail'),$this->input->post('password'));
			$this->load->view('formvalide');	
		}
		else
		{
			$this->load->view('v_jeparticipe');
		}
	}
}