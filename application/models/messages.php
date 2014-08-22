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
}
