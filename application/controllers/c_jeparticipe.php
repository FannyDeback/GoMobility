<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_jeparticipe extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('m_actors');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$validation = array(
			array(
				'field' => 'titre',
				'label' => 'Titre',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'type',
				'label' => 'Type de transport',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email|xss_clean'
			),
			array(
				'field' => 'start',
				'label' => 'Point de départ',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'arrival',
				'label' => 'Point d\'arrivée',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'jeu',
				'label' => 'Je participe',
				'rules' => 'trim|required'
			)
		);

		$this->form_validation->set_rules($validation);
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('v_header');
			$this->load->view('v_jeparticipe');
			$this->load->view('v_footer');	
		}
		else
		{
			$data = array(
				'titre' 		=> $this->input->post('titre'),
				'type'			=> $this->input->post('type'),
				'email'			=> $this->input->post('email'),
				'start'			=> $this->input->post('start'),
				'arrival'		=> $this->input->post('arrival'),
				'description'	=> $this->input->post('description'),
				'game'			=> $this->input->post('jeu'),
				'ges'			=> 210
			);

			$id = $this->m_actors->add_exp($data);
			redirect(base_url("experience/$id"));
		}
	}
}