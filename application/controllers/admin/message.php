<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class message extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->model('admin/user');
		$this->load->library('pagination');
		$this->load->model('messages');
	}

	public function index()
	{
		$data = array();
		$config['base_url'] = $this->config->base_url("admin/messages");
		$config['total_rows'] = $this->messages->count();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["messages"] = $this->messages->messages($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->layout->viewAdmin('admin/message/messages', $data);
	}

	public function supprimer($id)
	{
		$data = array();
		$data['message'] = $this->messages->delete((int) $id);

		redirect('admin/messages');
		//$this->layout->viewAdmin('admin/message/messages', $data);
	}
/*
	public function update($id)
	{
		$data = array();
		$message = $this->messages->messageById($id);
		if ($message != null)
		{
			if ($message[0]->status == "unread")
			{
				$status = array("status" => "read");
				$this->messages->update((int) $id, $status);
			}
			$data['message'] = $message[0];
		}

		$this->layout->viewAdmin('admin/message/message', $data);
	}
*/
	public function read($id)
	{
		$data = array();
		$message = $this->messages->messageById($id);
		if ($message != null)
		{
			if ($message[0]->status == "unread")
			{
				$status = array("status" => "read");
				$this->messages->update((int) $id, $status);
			}
			$data['message'] = $message[0];
		}

		$this->layout->viewAdmin('admin/message/message', $data);
	}
}
