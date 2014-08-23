<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class messages extends CI_Model {
	protected $table = "messages";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function addMessage($data)
	{
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	public function messageByStatus($status)
	{
		return $this->db->select("*")
						->from($this->table)
						->where("status", $status)
						->get()
						->result();
	}

	public function count()
	{
		return $this->db->count_all($this->table);
	}

	public function messages($status, $limit, $start)
	{
		$this->db->limit($limit, $start);
		$result = $this->db->select("*")
				 ->from($this->table)
				 ->order_by("status", $status)
				 ->get()
				 ->result();

		if (count($result) > 0)
		{
			return $result;
		}

		return false;
	}
}
