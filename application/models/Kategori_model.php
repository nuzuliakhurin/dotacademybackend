<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function get_kategori()
	{
		return $this->db->get('kategori')->result();
	}

	public function get_data_kategori_by_id($id)
	{
		return $this->db->where('id_kategori', $id)
						->get('kategori')
						->row();
	}

	public function tambah()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori')
		);
		$this->db->insert('kategori', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
			'nama_kategori' => $this->input->post('ubah_nama_kategori')
		);

		$this->db->where('id_kategori', $this->input->post('ubah_id_kategori'))
				->update('kategori', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_kategori', $this->input->post('hapus_id_kategori'))
			->delete('kategori');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */