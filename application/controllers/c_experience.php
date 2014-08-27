<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_experience extends CI_Controller {
	public function __construct()
	{
		// chargement des librairies et helpers
		parent:: __construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('pagination','form_validation'));
		$this->load->model('m_commentaire');
	}

	public function index()
	{
		// Mise en place de la pagination
		$config['base_url'] = $this->config->base_url("experiences");
		$config['total_rows'] = $this->m_actors->count();
		$config['per_page'] = 10;
		$config["uri_segment"] = 2;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$where = array("status" => "published");
		$data["experiences"] = $this->m_actors->experiences($config["per_page"], $page, $where);
		$data["links"] = $this->pagination->create_links();

		// Chargement content grâce au layout
		$this->layout->view('v_experiences', $data);
	}

	// méthode pour appel ajax
	public function experience_ajax($id)
	{
		$data = $this->m_actors->experienceById($id, array('status' => 'published'));
		if (null != $data[0])
			echo json_encode($data[0]);
	}

	// Méthode create commentaires 
	public function experience($id)
	{
		// règles sur les champs du formulaire
		
		$validation = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email|xss_clean'
			),
			array(
				'field' => 'message',
				'label' => 'Message',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'auteur',
				'label' => 'Auteur',
				'rules' => 'trim'
			),
			array(
				'field' => 'website',
				'label' => 'Website',
				'rules' => 'trim'
			)
		);

		$this->form_validation->set_rules($validation);
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

		//vérification des champs
		if ($this->form_validation->run() == false)
		{
			$exp = $this->m_actors->experienceById($id);
			if ($exp != null)
			{
				if ($exp[0]->status == 'published')
					$data['expStatus'] = 'published';
				else
					$data['expStatus'] = 'unpublished';
			}
			else
				$data['expStatus'] = '';

			$where = array("id_eco_actors" => $id, "status" => "published");
			$commentaires = $this->m_commentaire->comments($where, 10, 0);
			if ($commentaires != null)
			{
				$data['commentaires'] = $commentaires;
			}

			$data["id"] = $id;

			$this->layout->view('v_experience', $data);
		}
		// insertion des données dans la table comments
		else
		{
			$base_url = $this->config->base_url();
			$url = substr($base_url, 0, strlen($base_url) - 1) . $this->uri->uri_string();

			$commentaire = array (
				'email' 		=> $this->input->post('email'),
				'message'		=> $this->input->post('message'),
				'auteur'		=> $this->input->post('auteur'),
				'website'		=> $this->input->post('website'),
				'status'		=> "unpublished",
				'spam'			=> "no-spam",
				'date'			=> date('Y-m-d H:i:s'),
				'id_eco_actors'	=> $id
			);

			$comment_check = array (
                'author'	=> $this->input->post('auteur'),
                'email'		=> $this->input->post('email'),
                'website'	=> $this->input->post('website'),
                'body'		=> $this->input->post('message'),
                'permalink'	=> $url
        	);

			// Vérification SPAM avec ASKIMET
			$params = array($url, 'b52ecce6dc99', $comment_check);
			$this->load->library('Akismet', $params);

			// Si il y a des erreurs d'instanciation de Akismet
			if ($this->akismet->errorsExist())
			{
				if($this->akismet->isError('AKISMET_INVALID_KEY'))
					$data['erreur'] = "Commentaire momentanement suspendu.";
				elseif($this->akismet->isError('AKISMET_RESPONSE_FAILED'))
					$data['erreur'] = "Commentaire momentanement suspendu.";
				elseif($this->akismet->isError('AKISMET_SERVER_NOT_FOUND'))
					$data['erreur'] = "Commentaire momentanement suspendu.";

					$data["id"] = $id;
			}
			// Sinon insert bdd
			else
			{
				// Pas d'erreur, check spam.
				if ($this->akismet->isSpam())
				{
					$exp = $this->m_actors->experienceById($id);
					if ($exp != null)
					{
						if ($exp[0]->status == 'published')
							$data['expStatus'] = 'published';
						else
							$data['expStatus'] = 'unpublished';
					}
					else
						$data['expStatus'] = '';

					$where = array("id_eco_actors" => $id, "status" => "published");
					$commentaires = $this->m_commentaire->comments($where, 10, 0);
					if ($commentaires != null)
					{
						$data['commentaires'] = $commentaires;
					}
					$data['id'] = $id;

					$data['erreur'] = "Votre message a été considéré comme spam. Veuillez contactez l'administrateur via le formulaire de <a href='".base_url('contact')."'>contact</a>";
					$this->layout->view('v_experience', $data);
				}
				else
				{
					$this->m_commentaire->create($commentaire);
					redirect(base_url("experience/".$id));
				}
			}
		}
	}

	//méthode pour afficher les dix dernières expériences avec appel ajax
	public function dixExperienceAjax()
	{
		$data = $this->m_actors->experiences(10, 0, array("status" => "published"));
		if (null != $data)
			echo json_encode($data);
	}
}
