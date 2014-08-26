<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class commentaire extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->model('admin/user');
		$this->load->library('pagination');
		$this->load->model('m_commentaire');

		// Si le user n'est pas connecté
		if (!$this->session->userdata('id_user'))
		{
			redirect('admin/index');
			die();
		}
		if ($this->session->userdata('droit') != "admin")
		{
			redirect('admin/erreur');
			die();
		}
	}

	public function index()
	{
		$data = array();
		$config['base_url'] = $this->config->base_url("admin/commentaires");
		$config['total_rows'] = $this->m_commentaire->count();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["commentaires"] = $this->m_commentaire->comments(array(), $config["per_page"], $page, 'status desc, ');
		$data["links"] = $this->pagination->create_links();

		$this->layout->viewAdmin('admin/commentaire/commentaires', $data);
	}

	public function supprimer($id)
	{
		$data = array();
		$data['commentaire'] = $this->m_commentaire->delete((int) $id);

		redirect('admin/commentaires');
	}
}