<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class experience extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('pagination');
		$this->load->library('form_validation');

		// Si le user n'est pas connecté
		if (!$this->session->userdata('id_user'))
		{
			redirect('admin/index');
			die();
		}
	}

	public function index()
	{
		//filtres affichage des expériences ges décroissant
		$order_by = $_GET;
		if (empty($order_by))
			$order = "status desc";
		else if (isset($order_by['ges']))
		{
			$order = "ges ";
			$order .= ($order_by['ges'] == "desc") ? "desc" : "asc";
		}
		else
			$order = "status desc";

		if (isset($order_by['ges']))
		{
			$data['order_by'] = "<a href='".base_url('admin/experiences')."'>trier par status</a>";
			$config['url_format'] = base_url('admin/experiences/{offset}?'.http_build_query($_GET));
		}
		else
		{
			$data['order_by'] = "<a href='".base_url('admin/experiences?ges=asc')."'>trier par meilleur eco acteur</a>";
			$config['base_url'] = $this->config->base_url("admin/experiences");
		}
		
		$config["uri_segment"] = 3;
		$config['use_page_numbers'] = true;
		$config['cur_page'] = $this->uri->segment($config["uri_segment"]);
		$config['total_rows'] = $this->m_actors->count();
		$config['per_page'] = 10;
		$choice = $config["total_rows"] / $config["per_page"];
		$choice = round($choice);

		if (isset($order_by['ges']))
			$choice .= "?ges=desc";
		$config["num_links"] = $choice;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		$data["experiences"] = $this->m_actors->experiences($config["per_page"], $page - 1, array(), $order);
		$data["links"] = $this->pagination->create_links();
		//Pour supprimer
		$data['current_page'] = $this->uri->segment(3);

		$this->layout->viewAdmin('admin/experience/experiences', $data);
	}

	public function supprimer($id)
	{
		$data = array();
		$data['experience'] = $this->m_actors->delete((int) $id);

		redirect('admin/experiences');
	}

	public function update($id)
	{
		$experience = $this->m_actors->experienceById($id);
		if ($experience != null)
		{
			$experience = $experience[0];
			$validation = array(
				array(
					'field' => 'titre',
					'label' => 'Titre',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'type',
					'label' => 'Type de transport',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|valid_email|xss_clean'
				),
				array(
					'field' => 'start',
					'label' => 'Point de départ',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'arrival',
					'label' => 'Point d\'arrivée',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'description',
					'label' => 'Description',
					'rules' => 'trim|required'
				)
			);

			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');

			if ($this->form_validation->run() == false)
			{
				$data['experience'] = $experience;

				$this->layout->viewAdmin('admin/experience/experience', $data);
			}
			else
			{
				$exp = array(
					'titre' 		=> $this->input->post('titre'),
					'type'			=> $this->input->post('type'),
					'email'			=> $this->input->post('email'),
					'start'			=> $this->input->post('start'),
					'arrival'		=> $this->input->post('arrival'),
					'description'	=> $this->input->post('description'),
					'game'			=> ($this->input->post('jeu') == 'yes') ? 'yes' : 'no',
					'ges'			=> 210,
					"status"		=> ($this->input->post('status') == 'yes') ? 'published' : 'unpublished',
					'date'			=> date('Y-m-d H:i:s')
				);

				$this->m_actors->update((int) $id, $exp);
				redirect(base_url("admin/experiences"));
			}
		}
		// Si l'expérience n'existe pas
		else
		{
			$this->layout->viewAdmin("admin/experience/experience");
		}
	}

	public function publish($id)
	{
		$status = array("status" => "published");
		$this->m_actors->update((int) $id, $status);

		redirect('admin/experiences');
	}
}
