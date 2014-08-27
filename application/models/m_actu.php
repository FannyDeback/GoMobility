<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_actu extends MY_Model
{
	protected $table = "actu";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}
	//requête retournant l'id d'une actualité
	public function actualiteById($id, $where=array())
	{
		return $this->db->select("*")
						->from($this->table)
						->where("id", $id)
						->where($where)
						->order_by("id", "desc")
						->limit("1")
						->get()
						->result();
	}
	//requête retournant la dernière actualité publiée
	public function lastActu()
	{
		return $this->db->select("*")
						->from($this->table)
						->where("status", "published")
						->order_by("id", "desc")
						->limit("1")
						->get()
						->result();
	}
	//requête retournant toutes les actualités
	public function actualites($limit, $start, $where=array())
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
}