<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hijab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('hijab_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'data_hijab';
		$data['hijab'] = $this->hijab_model->get_hijab();
		$data['kategori'] = $this->hijab_model->get_kategori();
		$this->load->view('template', $data);
		} else {
			redirect('login/index');
		}
	}

	public function get_hijab_by_id($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data = $this->hijab_model->get_hijab_by_id($id);
			echo json_encode($data);
		} else {
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->form_validation->set_rules('nama_hijab', 'nama_hijab', 'trim|required');
			$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('harga', 'harga', 'trim|required');
			$this->form_validation->set_rules('stok', 'stok', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->hijab_model->tambah() == TRUE) {
					$this->session->set_flashdata('notif', 'Tambah Hijab Berhasil');
					redirect('hijab/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah Hijab Gagal');
					redirect('hijab/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('hijab/index');
			}
		} else {
			redirect('login/index');
		}

	}

	public function ubah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->form_validation->set_rules('ubah_nama_hijab', 'nama_hijab', 'trim|required');
			$this->form_validation->set_rules('ubah_kategori', 'kategori', 'trim|required');
			$this->form_validation->set_rules('ubah_deskripsi', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('ubah_harga', 'harga', 'trim|required');
			$this->form_validation->set_rules('ubah_stok', 'stok', 'trim|required');

			if ($this->form_validation->run() == TRUE ) {
				if ($this->hijab_model->ubah() == TRUE) {
					$this->session->set_flashdata('notif', 'Ubah data hijab berhasil');
					redirect('hijab/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah data hijab gagal');
					redirect('hijab/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('hijab/index');
			}
		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			
			if ($this->hijab_model->hapus() ==TRUE) {
				$this->session->set_flashdata('notif', 'Penghapusa data hijab berhasil');
				redirect('hijab/index');
			} else {
				$this->session->set_flashdata('notif', 'Penghapusan data hijab gagal');
				redirect('hijab/index');
			}
		} else {
			redirect('login/index');
		}
	}

}

/* End of file hijab.php */
/* Location: ./application/controllers/hijab.php */