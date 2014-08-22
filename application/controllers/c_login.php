<?php

class C_login extends CI_Controller {
	
	public function index()
	{
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
				
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('v_login');
		}
		else
		{
			$this->load->view('v_login');
		}
	}
}
