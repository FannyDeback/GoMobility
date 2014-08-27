<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_actualite extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper(array('url', 'text'));
		$this->load->model('m_actu');		
	}
	public function actualite($id)
	{
		// derniere actu mise en ligne
		$actualite = $this->m_actu->actualiteById($id);
		$data = array();
		if ($actualite != null)
		{
			$data['actualite'] = $actualite[0];
		}

		$this->layout->view('actualite/v_actu', $data);
	}
}