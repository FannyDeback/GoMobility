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
		$this->form_validation->set_rules('titre', 'Titre', 'trim|required');	
		$this->form_validation->set_rules('type', 'Type de transport', 'trim|required');		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('latStart', 'Lattitude du depart', 'trim|required');	
		$this->form_validation->set_rules('longStart', 'Longitude du depart', 'trim|required');	
		$this->form_validation->set_rules('latArrival', 'Lattitude arrivee', 'trim|required');
		$this->form_validation->set_rules('longArrival', 'Longitude arrivee', 'trim|required');
		$this->form_validation->set_rules('description', 'description du parcours', 'trim|required');
		$this->form_validation->set_rules('jeu', 'participation au jeu', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_message('required','Ce champ est requis');

		if ($this->form_validation->run() == TRUE)
		{
			$this->m_actors->add_exp($this->input->post('titre'),$this->input->post('type'),$this->input->post('email'),$this->input->post('latStart'),$this->input->post('longStart'),$this->input->post('latArrival'),$this->input->post('LongArrival'),$this->input->post('description'),$this->input->post('jeu'));
			$this->load->view('formvalide');	
		}
		else
		{
			$this->load->view('v_header');
			$this->load->view('v_jeparticipe');
			$this->load->view('v_footer');		
		}
	}
}