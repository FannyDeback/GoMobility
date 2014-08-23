<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_experience extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('pagination');
	}

	public function index()
	{
		$config['base_url'] = $this->config->base_url("experiences");
		$config['total_rows'] = $this->m_actors->count();
		$config['per_page'] = 10;
		$config["uri_segment"] = 2;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$where = array("status" => "published");
		$data["experiences"] = $this->m_actors->experiences($config["per_page"], $page, $where);
		$data["links"] = $this->pagination->create_links();

		$this->layout->view('v_experiences', $data);
	}

	public function experience_ajax($id)
	{
		$data = $this->m_actors->experienceById($id);
		if (null != $data[0])
			echo json_encode($data[0]);
	}

	public function experience($id)
	{
		$data["id"] = $id;

		$this->layout->view('v_experience', $data);
	}
}
