<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_actors extends MY_Model
{
	protected $table = "eco_actors";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	//requête retournant la dernière expérience publiée
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

	//requête retournant l'id d'une experience
	public function experienceById($id, $where=array())
	{
		return $this->db->select("*")
						->from($this->table)
						->where("id", $id)
						->where($where)
						->get()
						->result();
	}

	//requête retournant toutes les expériences
	public function experiences($limit, $start, $where=array(), $order_by="id desc")
	{
		$this->db->limit($limit, $start);
		$result = $this->db->select("*")
				 ->from($this->table)
				 ->where($where)
				 ->order_by($order_by)
				 ->get()
				 ->result();

		if (count($result) > 0)
		{
			return $result;
		}

		return false;
	}
	//requête retournant experience publiée
	public function experienceByStatus($status)
	{
		return $this->db->select("*")
						->from($this->table)
						->where("status", $status)
						->get()
						->result();
	}
	
	// requête retournant l'id du meilleur eco_acteur
	public function bestActorId($where=array())
	{
		return $this->db->select("id")
						->limit(1)
					 	->from($this->table)
					 	->where('ges = (select min(ges) from eco_actors)')
					 	->where($where)
					 	->get()
					 	->result();
	}

	// requête retournant l'email meilleur eco_acteur dans l'admin
	public function bestActor($where=array())
	{
		return $this->db->select("email")
						->limit(1)
					 	->from($this->table)
					 	->where('ges = (select min(ges) from eco_actors)')
					 	->where($where)
					 	->get()
					 	->result();
	}
}
