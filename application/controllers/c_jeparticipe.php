<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_jeparticipe extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form','url','GMapAPI'));
		$this->load->library(array('form_validation'));
	}
	// vérification du formulaire "je participe" et envoie des données dans table eco_actors
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
			)
		);

		$this->form_validation->set_rules($validation);
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

		if ($this->form_validation->run() == false)
		{
			$this->layout->view('v_jeparticipe');
		}
		else
		{
			$infoexp = get_experience_info($this->input->post('start'), $this->input->post('arrival'), $this->input->post('type'));
			$data = array(
				'titre' 		=> $this->input->post('titre'),
				'type'			=> $this->input->post('type'),
				'email'			=> $this->input->post('email'),
				'start'			=> $this->input->post('start'),
				'arrival'		=> $this->input->post('arrival'),
				'description'	=> $this->input->post('description'),
				'game'			=> ($this->input->post('game') == 'yes') ? 'yes' : 'no', 	
				'ges'			=> $infoexp['ges']
			);

			// $id = $this->m_actors->add_exp($data);
			$id = $this->m_actors->create($data);
			redirect(base_url("experience/$id"));
		}
	}
}
