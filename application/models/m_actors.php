<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_actors extends MY_Model
{
	protected $table = "eco_actors";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function last_exp()
	{
		return $this->db->select("*")
						->from($this->table)
						->where("status", "published")
						->order_by("id", "desc")
						->limit("1")
						->get()
						->result();
	}

	public function experienceById($id)
	{
		return $this->db->select("*")
						->from($this->table)
						->where("id", $id)
						->get()
						->result();
	}

	public function experiences($limit, $start, $where=array())
	{
		$this->db->limit($limit, $start);
		$result = $this->db->select("*")
				 ->from($this->table)
				 ->where($where)
				 ->get()
				 ->result();

		if (count($result) > 0)
		{
			return $result;
		}

		return false;
	}

	public function experienceByStatus($status)
	{
		return $this->db->select("*")
						->from($this->table)
						->where("status", $status)
						->get()
						->result();
	}

	public function bestActorId()
	{
		return $this->db->select("id")
						->limit(1)
					 	->from($this->table)
					 	->where('ges = (select max(ges) from eco_actors)')
					 	->get()
					 	->result();
	}

	public function bestActor()
	{
		return $this->db->select("email")
						->limit(1)
					 	->from($this->table)
					 	->where('ges = (select max(ges) from eco_actors)')
					 	->get()
					 	->result();
	}
}
