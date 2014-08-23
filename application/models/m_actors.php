<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_actors extends CI_Model {
	
	protected $table = "eco_actors";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function actors_count()
	{
		return $this->db->count_all($this->table);
	}

	public function last_exp()
	{
		//$query = $this->db->query("SELECT * FROM eco_actors ORDER BY id DESC LIMIT 1");
		return $this->db->select("*")
						->from($this->table)
						->order_by("id", "desc")
						->limit("1")
						->get()
						->result();
		//return $query->result_array();
	}

	public function experienceById($id)
	{
		return $this->db->select("*")
						->from($this->table)
						->where("id", $id)
						->get()
						->result();
	}

	public function experiences($limit, $start)
	{
		$this->db->limit($limit, $start);
		$result = $this->db->select("*")
				 ->from($this->table)
				 ->where("status", "published")
				 ->get()
				 ->result();

		if (count($result) > 0)
		{
			return $result;
		}

		return false;
	}

	public function add_exp($data)
	{
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	public function experienceByStatus($status)
	{
		return $this->db->select("*")
						->from($this->table)
						->where("status", $status)
						->get()
						->result();
	}

	public function best_actor()
	{
		return $this->db->select("id")
						->limit(1)
					 	->from($this->table)
					 	->where('ges = (select max(ges) from eco_actors)')
					 	->get()
					 	->result();
	}
}
