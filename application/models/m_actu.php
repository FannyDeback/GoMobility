<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_actu extends MY_Model
{
	protected $table = "actu";

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function actualiteById($id)
	{
		return $this->db->select("*")
						->from($this->table)
						->where("status", "published")
						->where("id", $id)
						->order_by("id", "desc")
						->limit("1")
						->get()
						->result();
	}

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
}