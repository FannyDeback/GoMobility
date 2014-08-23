<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_experience extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('m_actors');
	}

	public function index()
	{
		$config['base_url'] = $this->config->base_url("experiences");
		$config['total_rows'] = $this->m_actors->actors_count();
		$config['per_page'] = 10;
		$config["uri_segment"] = 2;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$data["experiences"] = $this->m_actors->experiences($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->load->view('v_header');		
		$this->load->view('v_experiences',$data);
		$this->load->view('v_footer');
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

		$this->load->view('v_header');
		$this->load->view('v_experience', $data);
		$this->load->view('v_footer');
	}

	public function best_actor()
	{
		$data['best'] = $this->m_actors->best_actor()[0];

		$this->load->view('v_header');
		$this->load->view('v_bestactor',$data);
		$this->load->view('v_footer');
	}
}
