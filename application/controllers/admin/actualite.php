<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class actualite extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('pagination');
		$this->load->library('form_validation');

		// Si le user n'est pas connecté
		if (!$this->session->userdata('id_user'))
		{
			redirect('admin/index');
			die();
		}
	}

	// pagination des actualités
	public function index()
	{
		$config['base_url'] = $this->config->base_url("admin/actualites");
		$config['total_rows'] = $this->m_actu->count();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["actualites"] = $this->m_actu->actualites($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->layout->viewAdmin('admin/actualite/actualites', $data);
	}

	// méhode création d'une actualité
	public function create()
	{
		$validation = array(
			array(
				'field' => 'titre',
				'label' => 'Titre',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'description',
				'label' => 'Description de l\'actualité',
				'rules' => 'trim|required'
			),
		);

		$this->form_validation->set_rules($validation);
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

		if ($this->form_validation->run() == false)
		{
			$this->layout->viewAdmin('admin/actualite/actualite');
		}
		else
		{
			// var_dump($this->input->post('jeu'), $this->input->post('status'));die();
			$data = array(
				'titre' 		=> $this->input->post('titre'),
				'description'	=> $this->input->post('description'),
				"status"		=> ($this->input->post('status') == 'yes') ? 'published' : 'unpublished'
			);

			$this->m_actu->create($data);
			redirect(base_url("admin/actualites"));
		}
	}
	// méthode pour supprimer une actualité via le MY_MODEL
	public function supprimer($id)
	{
		$data = array();
		$data['actualite'] = $this->m_actu->delete((int) $id);

		redirect('admin/actualites');
	}

	// méthode pour mettre à jour une actualité
	public function update($id)
	{
		$actualite = $this->m_actu->actualiteById($id);
		if ($actualite != null)
		{
			$actualite = $actualite[0];
			$validation = array(
				array(
					'field' => 'titre',
					'label' => 'Titre de l\'actualité',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'description',
					'label' => 'Description de l\actualité',
					'rules' => 'trim|required'
				)
			);

			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');

			if ($this->form_validation->run() == false)
			{
				$data['actualite'] = $actualite;

				$this->layout->viewAdmin('admin/actualite/actualite', $data);
			}
			else
			{
				$data = array(
					'titre' 		=> $this->input->post('titre'),
					'description'	=> $this->input->post('description'),
					"status"		=> ($this->input->post('status') == 'yes') ? 'published' : 'unpublished'
				);

				$this->m_actu->update((int) $id, $data);
				redirect(base_url("admin/actualites"));
			}
		}
		// Si l'expérience n'existe pas
		else
		{
			$this->layout->viewAdmin("admin/actualite/actualite");
		}
	}

	//méthode pour mettre en statut "published" une actualité 
	public function publish($id)
	{
		$status = array("status" => "published");
		$this->m_actu->update((int) $id, $status);

		redirect('admin/actualites');
	}
}