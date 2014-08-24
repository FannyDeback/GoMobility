<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class experience extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('pagination');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$config['base_url'] = $this->config->base_url("admin/experiences");
		$config['total_rows'] = $this->m_actors->count();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["experiences"] = $this->m_actors->experiences($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->layout->viewAdmin('admin/experience/experiences', $data);
	}

	public function supprimer($id)
	{
		$data = array();
		$data['experience'] = $this->m_actors->delete((int) $id);

		redirect('admin/experiences');
	}

	public function update($id)
	{
		$experience = $this->m_actors->experienceById($id);
		if ($experience != null)
		{
			$experience = $experience[0];
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
				)
			);

			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');

			if ($this->form_validation->run() == false)
			{
				$data['experience'] = $experience;

				$this->layout->viewAdmin('admin/experience/experience', $data);
			}
			else
			{
				// var_dump($this->input->post('jeu'), $this->input->post('status'));die();
				$data = array(
					'titre' 		=> $this->input->post('titre'),
					'type'			=> $this->input->post('type'),
					'email'			=> $this->input->post('email'),
					'start'			=> $this->input->post('start'),
					'arrival'		=> $this->input->post('arrival'),
					'description'	=> $this->input->post('description'),
					'game'			=> ($this->input->post('jeu') == 'yes') ? 'yes' : 'no',
					'ges'			=> 210,
					"status"		=> ($this->input->post('status') == 'yes') ? 'published' : 'unpublished'
				);

				$this->m_actors->update((int) $id, $data);
				redirect(base_url("admin/experiences"));
			}
		}
		// Si l'expérience n'éxiste pas
		else
		{
			$this->layout->viewAdmin("admin/experience/experience");
		}
	}

	public function publish($id)
	{
		$status = array("status" => "published");
		$this->m_actors->update((int) $id, $status);

		redirect('admin/experiences');
	}
}
