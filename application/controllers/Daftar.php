<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('daftar_model');
	// }

	public function index()
	{
		$this->load->view('daftar');
	}

	public function register()
	{
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'email' => $email,
			'username' => $username,
			'password' => ($password)
		);
		$this->db->insert('admin', $data);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('notif', 'Daftar Berhasil');
			redirect('login/index');
		} else {
			$this->session->set_flashdata('notif', 'Daftar Gagal');
			redirect('daftar/index');
		}
	}

}

/* End of file daftar.php */
/* Location: ./application/controllers/daftar.php */