<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_admin()
	{
		return $this->db->get('admin')->result();
	}


	public function get_data_admin_by_id($id)
	{
		return $this->db->where('id_admin', $id)
						->get('admin')
						->row();
	}

	public function tambah()
	{
		$data = array(
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$this->db->insert('admin', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
			'email' => $this->input->post('ubah_email'),
			'username' => $this->input->post('ubah_username'),
			'password' => $this->input->post('ubah_password'),
		);

		$this->db->where('id_admin', $this->input->post('ubah_id_admin'))
				->update('admin', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_admin', $this->input->post('hapus_id_admin'))
			->delete('admin');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */