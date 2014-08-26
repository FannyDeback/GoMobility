<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_commentaire extends MY_Model
{
	protected $table = "comments";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function comments($id_eco_actors, $limit, $start)
	{
		$this->db->limit($limit, $start);
		$result = $this->db->select("*")
				 ->from($this->table)
				 ->where("id_eco_actors", $id_eco_actors)
				 ->order_by("date", "desc")
				 ->get()
				 ->result();

		if (count($result) > 0)
		{
			return $result;
		}

		return false;
	}
}
