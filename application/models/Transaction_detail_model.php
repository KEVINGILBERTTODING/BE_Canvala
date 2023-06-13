<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Transaction_detail_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getDetail($id)
	{
		$this->db->select('*');
		$this->db->from('transactions_details');
		$this->db->join('products', 'products.id_product = transactions_details.product_id', 'left');
		$this->db->join('products_galleries', 'products_galleries.product_id = transactions_details.product_id', 'left');
		$this->db->where('transaction_id', $id);
		return $this->db->get()->result();
	}
}

/* End of file Transaction_detail_model.php */
/* Location: ./application/models/Transaction_detail_model.php */
