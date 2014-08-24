<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class actualite extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('pagination');
		$this->load->library('form_validation');
	}

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
			redirect(base_url("admin/actualite"));
		}
	}

	public function supprimer($id)
	{
		$data = array();
		$data['actualite'] = $this->m_actu->delete((int) $id);

		redirect('admin/actualites');
	}
}