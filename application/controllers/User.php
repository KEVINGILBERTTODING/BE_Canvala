<?php
defined('BASEPATH') or exit('No direct script access allowed');



class User extends CI_Controller
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

	function getAllProduct()
	{
		echo json_encode($this->product_model->getAllProducts());
	}

	function getUserById()
	{
		$id = $this->input->get('id');
		echo json_encode($this->user_model->getUserById($id));
	}

	function getCart()
	{
		$id = $this->input->get('id');
		echo json_encode($this->cart_model->getCartById($id));
	}

	function addProductCart()
	{
		$qty = $this->input->post('qty');
		$productId = $this->input->post('product_id');
		$cekStock = $this->product_model->getProductById($productId);
		$userId = $this->input->post('user_id');
		$hargaProduct = $cekStock['price'];
		$total = $hargaProduct * $qty;
		$stokProduct = $cekStock['stock'] - $qty;


		// cek stock
		if ($qty > $cekStock['stock']) {
			$response = [
				'status' => 404,
				'message' => 'Stock tidak mencukupi'
			];
			echo json_encode($response);
		} else {
			$data = [
				'user_id' => $userId,
				'product_id' => $productId,
				'banyak' => $qty,
				'total' => $total

			];

			$dataProduct = [
				'stock' => $stokProduct
			];

			// masukkan ke dalam cart
			$insert = $this->cart_model->addToCart($data, $productId, $dataProduct);
			if ($insert == true) {
				$response = [
					'status' => 200,
					'message' => 'Berhasil memasukkan kedalam keranjang'
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
	}

	function deleteCart()
	{
		$idCart = $this->input->post('id_cart');
		$idProduct = $this->input->post('id_product');
		$stock = $this->input->post('stock');
		$cekStock = $this->product_model->getProductById($idProduct);
		$finalStock = $cekStock['stock'] + $stock;
		$dataProduct = [
			'stock' => $finalStock
		];

		$trans = $this->cart_model->deleteCart($idCart, $idProduct, $dataProduct);
		if ($trans == true) {
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

	function getInformationOrder()
	{
		$userId = $this->input->post('user_id');
		$totalBeratPesanan = $this->cart_model->getBeratPesanan($userId);
		$qty = $this->cart_model->getBeratPesanan($userId);
		$hargaTotal = $this->cart_model->getTotalPrice($userId);
		$response = [
			'berat' => $totalBeratPesanan,
			'harga_total' => $hargaTotal,
			'qty' => $qty
		];

		echo json_encode($response);
	}

	function updateAlamat()
	{
		$userId = $this->input->post('user_id');
		$data = [
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'postal_code' => $this->input->post('postal_code'),

		];

		$update = $this->user_model->update($userId, $data);
		if ($update == true) {
			$response = [
				'status' => 200,
				'message' => 'Berhasil memperbarui alamat'
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

	function checkOut()
	{
		$userId = $this->input->post('user_id');
		$totalPrice = $this->input->post('total_price');
		$city = $this->input->post('city');
		$rekId = $this->input->post('rek_id');
		$weightTotal = $this->input->post('weight_total');
		$transId = $this->transaction_model->getMaxId();
		// create randowm integer 7 digit
		$rand = rand(1000000, 9999999);
		$transactionCode = 'EZM-' . $rand;
		$prdCode = 'PRD-' . $rand;


		// insert transactions
		$dataTransactions = [
			'user_id' => $userId,
			'total_price' => $totalPrice,
			'city' => $city,
			'rekening_id' => $rekId,
			'transaction_status' => 'BELUM KONFIRMASI',
			'weight_total' => $weightTotal,
			'delivered' => 0,
			'code' => $transactionCode,
			'created_at' => date('Y-m-d H:i:s')
		];


		// data detail transactions
		$product = $this->cart_model->getCartById($userId);
		$dataDetailTransaction = array(); // Initialize an array to store data for each iteration
		foreach ($product as $item) {
			$data = [
				'transaction_id' => $transId,
				'product_id' => $item->product_id,
				'price' => $item->total,
				'banyak' => $item->banyak,
				'code_product' => $prdCode,
			];

			$dataDetailTransaction[] = $data; // Add current iteration's data to the array
		}

		$insert = $this->transaction_model->checkOut($dataTransactions, $dataDetailTransaction, $userId); // Assuming insertBatch() is a valid method for inserting multiple rows

		if ($insert == true) {
			$response = [
				'status' => 200,
				'message' => 'Berhasil checkout'
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
	function getMyTransactions()
	{
		$id = $this->input->get('user_id');
		echo json_encode($this->transaction_model->getTransactionsByUserId($id));
	}

	function uploadBuktiTransfer()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 5000;


		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('bukti')) {
			$response = [
				'code' => 404,
				'message' => 'Format file tidak sesuai'
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
						'code' => 404,
						'message' => 'Terjadi kesalahan'
					];
					echo json_encode($response);
				}
			}
		}

		$userId = $this->input->post('id_transactions');

		$data = [
			'photo_transaction' => $file_name
		];



		$update =  $this->transaction_model->update($userId, $data);
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
	}
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
