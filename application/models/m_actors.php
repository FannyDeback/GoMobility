<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_actors extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function actors_count()
	{
		return $this->db->count_all("eco_actors");
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

	public function experiences($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get("eco_actors");

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}

		return false;
	}

	public function add_exp($data)
	{
		$this->db->insert("eco_actors", $data);

		return $this->db->insert_id();
		//$query = $this->db->query("INSERT INTO profil(titre, email, type, start, arrival, description, game, ges) VALUES('". $titre ."','". $email ."', '". $type ."''". $start ."','". $arrival ."','". $description ."','". $game ."','". $ges ."',) ");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */