<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('admin/user');
	}

	public function index()
	{
		// Si le user n'est pas connecté
		if (!$this->session->userdata('id_user'))
		{
			$validation = array(
				array(
					'field' => 'login',
					'label' => 'Login',
					'rules' => 'trim|required|xss_clean'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|xss_clean'
				)
			);

			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');

			$userExists = $this->user->exists($this->input->post('login'), $this->input->post('password'));

			if ($this->form_validation->run() == false)
			{
				$this->load->view('v_header');
				$this->load->view('admin/index');
				$this->load->view('v_footer');
			}
			elseif ($this->form_validation->run() && ($userExists != 1))
			{
				$this->session->set_flashdata('noconnect', 'Aucun compte ne correspond à vos identifiants');
				redirect('admin/index');
			}
			else
			{
				$this->session->set_userdata('id_user', $this->input->post('login'));

				redirect('admin/index');
			}
		}
		else
		{
			$data = array();
			$data['id_user'] = $this->session->userdata('id_user');

			$this->load->view('v_header');
			$this->load->view('admin/index', $data);
			$this->load->view('v_footer');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}
