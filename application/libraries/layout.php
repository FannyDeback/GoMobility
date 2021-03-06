<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $output = '';

	
	public function __construct()
	{
		$this->CI = get_instance();
	}

	public function view($name, $data = array())
	{
		$actu = $this->CI->m_actu->lastActu();
		if ($actu != null)
		{
			$data['actu'] = $actu[0];
		}

		$data['act'] = $this->CI->m_actors->count("status", "published");
		
		$best = $this->CI->m_actors->bestActorId(array("status" => "published"));
		if ($best != null)
			$data['best'] = $best[0];

		$this->output .= $this->CI->load->view($name, $data, true);
		$this->CI->load->view('index.php', array('output' => $this->output));
	}

	public function views($name, $data = array())
	{
		$this->output .= $this->CI->load->view($name, $data, true);
		return $this;
	}

	public function viewAdmin($name, $data = array())
	{
		if ($this->CI->session->userdata('id_user'))
		{
			$best = $this->CI->m_actors->bestActorId();
			if ($best != null)
				$data['best'] = $best[0];
			$data['id_user'] = $this->CI->session->userdata('id_user');
		}
		$this->output .= $this->CI->load->view($name, $data, true);
		$this->CI->load->view('admin/index.php', array('output' => $this->output));
	}

	public function viewsAdmin($name, $data = array())
	{
		$this->output .= $this->CI->load->viewAdmin($name, $data, true);
		return $this;
	}

	public function viewError404()
	{
		$this->output->set_status_header('404');
		$data['content'] = 'v_error404'; // View name 
        $this->load->view('index');//loading in my template
	}
}
