<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_experience extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');

		$this->load->model('m_actors');
		$data['experiences'] = $this->m_actors->experiences();
		
		$this->load->view('v_header');
		$this->load->view('v_experiences',$data);
		$this->load->view('v_footer');
	}

	public function experience($id)
	{
		$this->load->helper('url');

		$this->load->model('m_actors');

		$experience = $this->m_actors->experienceById($id);

		$this->load->view('v_header');
		$this->load->view('v_experience', $experience[0]);
		$this->load->view('v_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */