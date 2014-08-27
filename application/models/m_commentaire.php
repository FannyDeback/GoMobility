<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_commentaire extends MY_Model
{
	protected $table = "comments";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}
	//requête retournant l'id d'un commentaire
	public function commentById($id, $where=array())
	{
		return $this->db->select("*")
						->from($this->table)
						->where("id", $id)
						->where($where)
						->get()
						->result();
	}
	//requête retournant tous le commentaires
	public function comments($where, $limit, $start, $order_by="")
	{
		$order_by .= "date desc";
		//	Raccourci dans le cas où on sélectionne l'id
		if(is_integer($where))
		{
			$where = array('id_eco_actors' => $where);
		}

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
}
