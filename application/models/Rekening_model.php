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
}

/* End of file Rekening_model.php */
/* Location: ./application/models/Rekening_model.php */
