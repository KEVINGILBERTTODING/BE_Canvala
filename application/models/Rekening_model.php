<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Rekening_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getAllRekening()
	{

		$this->db->select('*');
		$this->db->from('rekening_numbers');
		return $this->db->get()->result();
	}

	function insert($data)
	{
		$insert = $this->db->insert('rekening_numbers', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}

	function update($id, $data)
	{

		$this->db->where('id_rekening', $id);
		$update = $this->db->update('rekening_numbers', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function delete($id)
	{

		$this->db->where('id_rekening', $id);
		$delete = $this->db->delete('rekening_numbers');
		if ($delete) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Rekening_model.php */
/* Location: ./application/models/Rekening_model.php */
