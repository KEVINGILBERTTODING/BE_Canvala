<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('user_model');
	}

	function login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$validateEmailUsers = $this->user_model->validateEmail($email);



		if ($validateEmailUsers != null) {
			if (password_verify($password, $validateEmailUsers['password'])) {
				$response = [
					'status' => 200,
					'user_id' => $validateEmailUsers['id_user'],
					'role' => $validateEmailUsers['roles']
				];
				echo json_encode($response);
			} else {
				$response = [
					'status' => 404,
					'message' => 'Password salah'
				];
				echo json_encode($response);
			}
		} else {
			$response = [
				'status' => 404,
				'message' => 'Email belum terdaftar'
			];
			echo json_encode($response);
		}
	}
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
