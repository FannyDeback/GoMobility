<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_experience extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('pagination','form_validation'));
		$this->load->model('m_commentaire');
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
		$data = $this->m_actors->experienceById($id, array('status' => 'published'));
		if (null != $data[0])
			echo json_encode($data[0]);
	}

	public function experience($id)
	{
		$validation = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email|xss_clean'
			),
			array(
				'field' => 'message',
				'label' => 'Message',
				'rules' => 'trim|required'
			)
		);

		$this->form_validation->set_rules($validation);
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

		if ($this->form_validation->run() == false)
		{
			$exp = $this->m_actors->experienceById($id);
			if ($exp != null)
			{
				if ($exp[0]->status == 'published')
					$data['expStatus'] = 'published';
				else
					$data['expStatus'] = 'unpublished';
			}
			else
				$data['expStatus'] = '';

			$data["id"] = $id;

			$this->layout->view('v_experience', $data);
		}
		else
		{
			$data = array(
				'email' 		=> $this->input->post('email'),
				'message'		=> $this->input->post('message'),
				'status'		=> "unpublished",
				'spam'			=> "no-spam",
				'date'			=> date('Y-m-d H:i:s'),
				'id_eco_actors'	=> $id
			);

			$this->m_commentaire->create($data);
			redirect(base_url("experience/".$id));
		}
	}

	public function dixExperienceAjax()
	{
		$data = $this->m_actors->experiences(10, 0, array("status" => "published"));
		if (null != $data)
			echo json_encode($data);
	}
}
