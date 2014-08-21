<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_contact extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('email', $email_config);

	}
	// envoyer un mail avec gmail
	public function index(){

		$this->load->view('v_contact');

	    /*$email_config = Array(
	        'protocol'  => 'smtp',
	        'smtp_host' => 'ssl://smtp.googlemail.com',
	        'smtp_port' => '465',
	        'smtp_user' => 'fannydeback@gmail.com',
	        'smtp_pass' => 'avalon88',
	        'mailtype'  => 'html',
	        'starttls'  => true,
	        'newline'   => "\r\n"
	    );
	 
	 	$this->email->clear();
	 	
	    $this->email->from('', 'A. Sir');
	    $this->email->to('john.sir@example.com');
	 
	    $this->email->subject('Sire Subject');
	    $data = array( 'message' => "Hello Sir, you've got mail!");
	    $email = $this->load->view('email/template', $data, TRUE);
	 
	    $this->email->message( $email );
	    $this->email->send();*/
	}
}