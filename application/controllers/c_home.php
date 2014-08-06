<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_home extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		
		$this->load->model('m_actors');
		/*$this->load->model('m_categorie');

		$data['cat']=$this->m_categorie->categorie();

		$data['prod']=$this->m_produit->produits();*/
		$data['act']=$this->m_actors->actors();
		$data['exp']=$this->m_actors->last_exp();

		$this->load->view('v_header');
		$this->load->view('v_home',$data);
		$this->load->view('v_footer');
	}

	public function lastexp()
	{

		$this->load->view('v_header');
		$this->load->view('v_lastexp');
		$this->load->view('v_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */