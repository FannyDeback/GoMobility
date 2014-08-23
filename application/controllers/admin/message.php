<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class message extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('admin/user');
		$this->load->library('pagination');
		$this->load->model('messages');
	}

	public function index()
	{
		$config['base_url'] = $this->config->base_url("admin/messages");
		$config['total_rows'] = $this->messages->count();
		$config['per_page'] = 2;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["messages"] = $this->messages->messages("unread", $config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->layout->viewAdmin('admin/messages', $data);
	}
}
