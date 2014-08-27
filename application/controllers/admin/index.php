<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('admin/user');
		$this->load->model('messages');
	}

	public function erreur()
	{
		$this->layout->viewAdmin("admin/erreur");
	}
	// Vérification formulaire connexion à l'admin
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
				$this->layout->viewAdmin('admin/home');
			}
			elseif ($this->form_validation->run() && empty($userExists))
			{
				$this->session->set_flashdata('noconnect', 'Aucun compte ne correspond à vos identifiants');
				redirect('admin/index');
			}
			else
			{
				$this->session->set_userdata('id_user', $this->input->post('login'));
				$this->session->set_userdata('droit', $userExists[0]->status);

				redirect('admin/index');
			}
		}
		else
		{
			$data = array();
			$data['id_user'] = $this->session->userdata('id_user');
			$data['exp_ligne'] = count($this->m_actors->experienceByStatus("published"));
			$data['exp_attente'] = count($this->m_actors->experienceByStatus("unpublished"));
			$data['message_lu'] = count($this->messages->messageByStatus("read"));
			$data['message_nonlu'] = count($this->messages->messageByStatus("unread"));
			$data['bestactor'] = $this->m_actors->bestActor()[0]->email;

			$this->layout->viewAdmin('admin/home', $data);
		}
	}
	//méthode de déconnexion
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/index');
	}
}
