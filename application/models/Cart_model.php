<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cart_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}


	function getCartById($id)
	{
		$this->db->select('*');
		$this->db->from('carts');
		$this->db->join('products', 'products.id_product = carts.product_id', 'left');
		$this->db->join('products_galleries', 'products_galleries.product_id = carts.product_id', 'left');
		$this->db->where('carts.user_id', $id);
		return $this->db->get()->result();
	}


	function insert($data)
	{

		$insert = $this->db->insert('carts', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */
