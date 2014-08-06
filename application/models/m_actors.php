<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_actors extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function actors()
	{
		$query = $this->db->query("SELECT COUNT(*) AS act FROM eco_actors");
		return $query->result_array();
	}

	public function last_exp()
	{
		$query = $this->db->query("SELECT * FROM eco_actors ORDER BY id DESC LIMIT 1");
		return $query->result_array();
	}

	public function experienceById($id)
	{
		/*$query = $this->db->prepare("SELECT * FROM eco_actors WHERE id = :id");
		$query->execute(array(':id' => $id));
		return $query->fetchAll();*/
		$query = $this->db->query("SELECT * FROM eco_actors WHERE id = " . $id);
		return $query->result_array();
	}

	public function experiences()
	{
		$query = $this->db->query("SELECT * FROM eco_actors ORDER BY id");
		return $query->result_array();
	}

	public function add_exp($titre, $id, $email, $type, $start, $arrival, $description, $game, $ges)
	{
		$query = $this->db->query("INSERT INTO profil(titre, email, type, start, arrival, description, game, ges) VALUES('". $titre ."','". $email ."', '". $type ."''". $start ."','". $arrival ."','". $description ."','". $game ."','". $ges ."',) ");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */