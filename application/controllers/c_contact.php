<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_contact extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$config = Array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'contact.gomobility@gmail.com',
		    'smtp_pass' => 'gomobility2014',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->load->model('messages');
	}

	// envoyer un mail avec gmail
	public function index()
	{
		$validation = array(
			array(
				'field' => 'nom',
				'label' => 'Nom',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email|xss_clean'
			),
			array(
				'field' => 'message',
				'label' => 'Type de transport',
				'rules' => 'trim|required'
			)
		);

		$this->form_validation->set_rules($validation);
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('v_header');
			$this->load->view('v_contact');
			$this->load->view('v_footer');	
		}
		else
		{
			// Insertion dans bdd
			$data = array(
				'nom'		=> $this->input->post('nom'),
				'email'		=> $this->input->post('email'),
				'message'	=> $this->input->post('message')
			);
			$this->messages->addMessage($data);

			// Envoie email
			$this->email->clear();
			$this->email->set_newline("\r\n");

			$this->email->from($this->input->post('email'), $this->input->post('nom'));
			$this->email->to('contact.gomobility@gmail.com'); 

			$this->email->subject('Email contact GoMobility');
			$this->email->message($this->input->post('message'));	

			$this->email->send();

			$this->load->view('v_header');
			$this->load->view('v_contact_succes');
			$this->load->view('v_footer');
		}
	}
}
