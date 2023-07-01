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
		$this->load->model('categories_model');
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

	function konfirmasiTransaction()
	{
		$transId = $this->input->post('trans_id');
		$data = [
			'transaction_status' => 'TERKONFIRMASI'
		];

		$update = $this->transaction_model->update($transId, $data);
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

	function terkirimTransaction()
	{

		$transId = $this->input->post('trans_id');
		$data = [
			'transaction_status' => 'TERKIRIM',
			'receiver' => $this->input->post('penerima'),
			'time_arrived' => date('Y-m-d H:i:s')
		];

		$update = $this->transaction_model->update($transId, $data);
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

	function getDetailTransactions()
	{
		$transId = $this->input->get('trans_id');
		echo json_encode($this->transaction_detail_model->getDetail($transId));
	}

	function downloadLaporan($dateStart, $dateEnd)
	{

		$this->load->library('pdflib');
		$this->pdflib->setFileName('Laporan_transaksi.pdf');
		$this->pdflib->setPaper('A4', 'potrait');
		$data['transactions'] = $this->transaction_model->filterTrans($dateStart, $dateEnd);
		$this->pdflib->loadView('v_report', $data);
	}

	function getCategories()
	{
		echo json_encode($this->categories_model->getCategories());
	}

	function deleteCategories()
	{
		$id = $this->input->post('id');
		$delete = $this->categories_model->delete($id);
		if ($delete == true) {
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

	function insertCategories()
	{
		$data = [
			'category_name' => $this->input->post('category_name'),
			'slug' => $this->input->post('category_name'),
		];

		$insert = $this->categories_model->insert($data);
		if ($insert == true) {
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

	function getAllRekening()
	{
		echo json_encode($this->rekening_model->getAllRekening());
	}


	function deleteRekening()
	{
		$id = $this->input->post('id');
		$delete = $this->rekening_model->delete($id);
		if ($delete == true) {
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

	function updateRekening()
	{
		$id = $this->input->post('id');
		$data = [
			'bank_name' => $this->input->post('bank_name'),
			'number' => $this->input->post('number'),
			'rekening_name' => $this->input->post('rekening_name')
		];
		$update = $this->rekening_model->update($id, $data);
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

	function getAllUsers()
	{
		echo json_encode($this->user_model->getAllUsers());
	}


	function insertRekening()
	{

		$data = [
			'bank_name' => $this->input->post('bank_name'),
			'number' => $this->input->post('number'),
			'rekening_name' => $this->input->post('rekening_name')
		];
		$insert = $this->rekening_model->insert($data);
		if ($insert == true) {
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

	function insertUsers()
	{

		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'postal_code' => $this->input->post('postal_code'),
			'roles' => $this->input->post('roles')
		];
		$insert = $this->user_model->insert($data);
		if ($insert == true) {
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

	function deleteUsers()
	{
		$id = $this->input->post('id');
		$delete = $this->user_model->delete($id);
		if ($delete == true) {
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

	function updateUsers()
	{

		$id = $this->input->post('id');
		$password = $this->input->post('password');
		if ($password == '') {
			$data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'phone_number' => $this->input->post('phone_number'),
				'postal_code' => $this->input->post('postal_code'),
				'roles' => $this->input->post('roles')
			];
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'address' => $this->input->post('address'),
				'phone_number' => $this->input->post('phone_number'),
				'postal_code' => $this->input->post('postal_code'),
				'roles' => $this->input->post('roles')
			];
		}



		$update = $this->user_model->update($id, $data);
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

	function insertProduct()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 5000;


		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$response = [
				'status' => 404,
				'message' => $this->upload->display_errors()
			];
			echo json_encode($response);
		} else {

			$data = array('upload_data' => $this->upload->data());


			$file_name = $data['upload_data']['file_name'];
			$source_path = './uploads/' . $data['upload_data']['file_name'];
			$dir_path = $_SERVER['DOCUMENT_ROOT'] . '/ortosec/assets/images/';
			if (!is_dir($dir_path)) {
				mkdir($dir_path, 0777, true);
			}

			$destination_path = $dir_path . $file_name;

			if (file_exists($source_path)) {
				if (copy($source_path, $destination_path)) {
				} else {
					$response = [
						'status' => 404,
						'message' => 'Terjadi kesalahan'
					];
					echo json_encode($response);
				}
			}
		}

		$productId = $this->product_model->getMaxId();

		$dataProduct = [
			'product_name' => $this->input->post('product_name'),
			'unit' => 1000,
			'price' => $this->input->post('price'),
			'descriptions' => $this->input->post('description'),
			'category_id' => $this->input->post('category_id'),
			'stock' => $this->input->post('stock'),
		];

		$dataGallery = [
			'product_id' => $productId,
			'photos' => $file_name
		];



		$insert = $this->product_model->insertProduct($dataProduct, $dataGallery);
		if ($insert == true) {
			$response = [
				'status' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'status' => 404,
				'message' => 'Terjadi kesalahan'
			];
			echo json_encode($response);
		}
	}

	function deleteProduct()
	{
		$id = $this->input->post('id');
		$delete = $this->product_model->deleteProduct($id);
		if ($delete == true) {
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


	function updateProduct()
	{

		$status = $this->input->post('status');
		$productId = $this->input->post('product_id');
		if ($status == 'true') {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 5000;


			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$response = [
					'status' => 404,
					'message' => $this->upload->display_errors()
				];
				echo json_encode($response);
			} else {

				$data = array('upload_data' => $this->upload->data());

				$file_name = $data['upload_data']['file_name'];
				$source_path = './uploads/' . $data['upload_data']['file_name'];
				$dir_path = $_SERVER['DOCUMENT_ROOT'] . '/ortosec/assets/images/';
				if (!is_dir($dir_path)) {
					mkdir($dir_path, 0777, true);
				}

				$destination_path = $dir_path . $file_name;

				if (file_exists($source_path)) {
					if (copy($source_path, $destination_path)) {
					} else {
						$response = [
							'status' => 404,
							'message' => 'Terjadi kesalahan'
						];
						echo json_encode($response);
					}
				}
			}

			$dataProduct = [
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'descriptions' => $this->input->post('description'),
				'category_id' => $this->input->post('category_id'),
				'stock' => $this->input->post('stock'),
			];

			$dataGallery = [
				'product_id' => $productId,
				'photos' => $file_name
			];



			$update = $this->product_model->updateProduct('true', $productId, $dataProduct, $dataGallery);
			if ($update == true) {
				$response = [
					'status' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'status' => 404,
					'message' => 'Terjadi kesalahan'
				];
				echo json_encode($response);
			}
		} else {
			$dataProduct = [
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'descriptions' => $this->input->post('description'),
				'category_id' => $this->input->post('category_id'),
				'stock' => $this->input->post('stock'),
			];
			$dataGallery = [
				'product_id' => $productId,
				'photos' => ''
			];

			$update = $this->product_model->updateProduct('false', $productId, $dataProduct, $dataGallery);
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

	function getProductById()
	{
		$id = $this->input->get('id');
		echo json_encode($this->product_model->getProductById($id));
	}
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
