<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class experience extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('pagination');
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
/*
	public function update($id)
	{
		$data = array();
		$experience = $this->m_actors->experienceById($id);
		if ($experience != null)
		{
			$status = array("status" => "read");
			$this->messages->update((int) $id, $status);
		}

		redirect('admin/experiences');
	}
*/
	public function publish($id)
	{
		$status = array("status" => "published");
		$this->m_actors->update((int) $id, $status);

		redirect('admin/experiences');
	}
}
