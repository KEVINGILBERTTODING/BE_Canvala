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

	function addToCart($dataCart, $idProduct, $dataProduct)
	{

		$this->db->trans_start();
		$this->db->insert('carts', $dataCart);

		$this->db->where('id_product', $idProduct);
		$this->db->update('products', $dataProduct);
		$this->db->trans_complete();

		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	function deleteCart($idCart, $idProduct, $dataProduct)
	{

		$this->db->trans_start();
		$this->db->where('id_cart', $idCart);
		$this->db->delete('carts');

		$this->db->where('id_product', $idProduct);
		$this->db->update('products', $dataProduct);

		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	function getBeratPesanan($id)
	{

		$this->db->select_sum('banyak');
		$this->db->from('carts');
		$this->db->where('carts.user_id', $id);
		$berat = $this->db->get()->row_array();
		return $berat['banyak'];
	}

	function getTotalPrice($id)
	{

		$this->db->select_sum('total');
		$this->db->from('carts');
		$this->db->where('carts.user_id', $id);
		$total = $this->db->get()->row_array();
		return $total['total'];
	}
}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */
