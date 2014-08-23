<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class messages extends MY_Model
{
	protected $table = "messages";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function messageByStatus($status)
	{
		return $this->db->select("*")
						->from($this->table)
						->where("status", $status)
						->get()
						->result();
	}

	public function messages($limit, $start)
	{
		$order = array("status" => "desc", "id" => "desc");
		$this->db->limit($limit, $start);
		$result = $this->db->select("*")
				 ->from($this->table)
				 ->order_by("status", "desc")
				 ->order_by("id", "desc")
				 ->get()
				 ->result();

		if (count($result) > 0)
		{
			return $result;
		}

		return false;
	}

	public function messageByID($id)
	{
		return $this->db->select("*")
						->limit(1)
						->from($this->table)
						->where("id", $id)
						->get()
						->result();
	}
}
