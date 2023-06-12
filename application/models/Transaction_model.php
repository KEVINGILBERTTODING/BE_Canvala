<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getMaxId()
	{
		$this->db->select_max('id_transaction');
		$this->db->from('transactions');
		$maxId  = $this->db->get()->row_array();
		return $maxId['id_transaction'] + 1;
	}

	function checkOut($dataTransactions, $dataDetailTransactions, $userId)
	{
		$this->db->trans_start();
		$this->db->insert('transactions', $dataTransactions);
		$this->db->insert_batch('transactions_details', $dataDetailTransactions);
		$this->db->where('user_id', $userId);
		$this->db->delete('carts');
		$this->db->trans_complete();

		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}
}
