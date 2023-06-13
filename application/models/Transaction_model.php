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

	function getTransactionsByUserId($id)
	{
		$this->db->select('*');
		$this->db->from('transactions');
		$this->db->join('users', 'users.id_user = transactions.user_id', 'left');
		$this->db->join('rekening_numbers', 'rekening_numbers. id_rekening = transactions.rekening_id', 'left');
		$this->db->where('transactions.user_id', $id);
		$this->db->order_by('id_transaction', 'desc');

		return $this->db->get()->result();
	}

	function update($id, $data)
	{
		$this->db->where('id_transaction', $id);
		$update = $this->db->update('transactions', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function getTransactionsByStatus($status)
	{

		if ($status == 'all') {
			$this->db->select('*');
			$this->db->from('transactions');
			$this->db->join('users', 'users.id_user = transactions.user_id', 'left');
			$this->db->join('rekening_numbers', 'rekening_numbers. id_rekening = transactions.rekening_id', 'left');
			$this->db->order_by('id_transaction', 'desc');
			return $this->db->get()->result();
		} else {
			$this->db->select('*');
			$this->db->from('transactions');
			$this->db->join('users', 'users.id_user = transactions.user_id', 'left');
			$this->db->join('rekening_numbers', 'rekening_numbers. id_rekening = transactions.rekening_id', 'left');
			$this->db->where('transactions.transaction_status', $status);
			$this->db->order_by('id_transaction', 'desc');
			return $this->db->get()->result();
		}
	}
}
