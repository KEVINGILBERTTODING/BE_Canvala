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
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
