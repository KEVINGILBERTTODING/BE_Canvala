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
}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */
