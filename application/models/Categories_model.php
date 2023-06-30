<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getCategories()
	{
		$this->db->select('*');
		$this->db->from('categories');
		return $this->db->get()->result();
	}

	function delete($id)
	{

		$this->db->where('id', $id);
		$delete = $this->db->delete('categories');
		if ($delete) {
			return true;
		} else {
			return false;
		}
	}

	function insert($data)
	{

		$insert = $this->db->insert('categories', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}
}
