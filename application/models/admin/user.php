<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Model {

	protected $table = 'users';

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function exists($login, $password)
	{
		return	(int) $this->db->where('username', $login)
				->where('password', md5($password))
				->count_all_results($this->table);
	}
}
