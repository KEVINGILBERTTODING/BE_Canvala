<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Product_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Product_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getAllProducts()
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_galleries', 'products_galleries. product_id = products.id_product', 'left');
		$this->db->where('products.stock !=', 0);
		return $this->db->get()->result();
	}

	function getProductById($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_galleries', 'products_galleries.product_id = products.id_product', 'left');
		$this->db->where('id_product', $id);
		return $this->db->get()->row_array();
	}

	function getAllProductsByKategori($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_galleries', 'products_galleries. product_id = products.id_product', 'left');
		$this->db->where('products.stock !=', 0);
		$this->db->where('category_id', $id);
		return $this->db->get()->result();
	}

	function deleteProduct($id)
	{

		$this->db->trans_start();
		$this->db->where('id_product', $id);
		$this->db->delete('products');
		$this->db->where('product_id', $id);
		$this->db->delete('products_galleries');
		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	function getMaxId()
	{
		$this->db->select_max('id_product');
		$this->db->from('products');
		$maxId = $this->db->get()->row_array()['id_product'] + 1;
		return $maxId;
	}

	function insertProduct($dataProduct, $dataGallery)
	{
		$this->db->trans_start();
		$this->db->insert('products', $dataProduct);
		$this->db->insert('products_galleries', $dataGallery);
		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	function updateProduct($status, $idProduct, $dataProduct, $dataGallery)
	{
		if ($status == 'true') {
			$this->db->trans_start();
			$this->db->where('id_product', $idProduct);
			$this->db->update('products', $dataProduct);
			$this->db->where('product_id', $idProduct);
			$this->db->update('products_galleries', $dataGallery);
			$this->db->trans_complete();
			if ($this->db->trans_status() == true) {
				return true;
			} else {
				return false;
			}
		} else {
			$this->db->where('id_product', $idProduct);
			$update = $this->db->update('products', $dataProduct);
			if ($update) {
				return true;
			} else {
				return false;
			}
		}
	}
}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */
