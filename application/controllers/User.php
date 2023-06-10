<?php
defined('BASEPATH') or exit('No direct script access allowed');



class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('product_model');
	}

	function getAllProduct()
	{
		echo json_encode($this->product_model->getAllProducts());
	}
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
