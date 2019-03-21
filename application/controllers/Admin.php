<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin';
			$data['admin'] = $this->admin_model->get_admin();
			$this->load->view('template', $data);	
		} else {
			redirect('login/index');
		}
	}


	public function get_data_admin_by_id($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data = $this->admin_model->get_data_admin_by_id($id);
			echo json_encode($data);
		} else {
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->admin_model->tambah() == TRUE) {
					$this->session->set_flashdata('notif', 'Tambah admin Berhasil');
					redirect('admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah admin Gagal');
					redirect('admin/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('admin/index');
			}
		} else {
			redirect('login/index');
		}

	}

	public function ubah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->form_validation->set_rules('ubah_email', 'email', 'trim|required');
			$this->form_validation->set_rules('ubah_username', 'username', 'trim|required');
			$this->form_validation->set_rules('ubah_password', 'password', 'trim|required');

			if ($this->form_validation->run() == TRUE ) {
				if ($this->admin_model->ubah() == TRUE) {
					$this->session->set_flashdata('notif', 'Ubah data admin berhasil');
					redirect('admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah data admin gagal');
					redirect('admin/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('admin/index');
			}
		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			
			if ($this->admin_model->hapus() ==TRUE) {
				$this->session->set_flashdata('notif', 'Penghapusa data admin berhasil');
				redirect('admin/index');
			} else {
				$this->session->set_flashdata('notif', 'Penghapusan data admin gagal');
				redirect('admin/index');
			}
		} else {
			redirect('login/index');
		}
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */