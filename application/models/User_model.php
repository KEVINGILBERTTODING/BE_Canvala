<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	function validateEmail($email)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		return $this->db->get()->row_array();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
