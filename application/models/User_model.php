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

	function getUserById($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id_user', $id);
		return $this->db->get()->row_array();
	}

	function insert($data)
	{
		$insert = $this->db->insert('users', $data);


		if ($insert) {
			return true;
		} else {
			return false;
		}
	}

	function update($id, $data)
	{
		$this->db->where('id_user', $id);
		$update = $this->db->update('users', $data);

		if ($update) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
