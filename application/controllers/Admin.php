<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('product_model');
		$this->load->model('user_model');
		$this->load->model('cart_model');
		$this->load->model('rekening_model');
		$this->load->model('transaction_detail_model');
		$this->load->model('transaction_model');
	}

	function getAllTransactionsByStatus()
	{

		$status = $this->input->get('status');
		echo json_encode($this->transaction_model->getTransactionsByStatus($status));
	}


	function updateProfile()
	{

		$password = $this->input->post('password');
		$userId = $this->input->post('user_id');

		if ($password == '') {
			$data = [
				'name' => $this->input->post('nama'),
				'phone_number' => $this->input->post('telepon'),
				'postal_code' => $this->input->post('kode_pos')
			];
		} else {
			$data = [
				'name' => $this->input->post('nama'),
				'phone_number' => $this->input->post('telepon'),
				'postal_code' => $this->input->post('kode_pos'),
				'password' => password_hash($password, PASSWORD_DEFAULT)
			];
		}

		$update = $this->user_model->update($userId, $data);
		if ($update == true) {
			$response = [
				'status' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'status' => 404
			];
			echo json_encode($response);
		}
	}
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
