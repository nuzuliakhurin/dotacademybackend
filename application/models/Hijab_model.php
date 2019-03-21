<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hijab_model extends CI_Model {

	public function get_hijab()
	{
		return $this->db->join('kategori','kategori.id_kategori = data_hijab.id_kategori')->get('data_hijab')->result();
	}

	public function get_kategori()
	{
		return $this->db->get('kategori')->result();
	}

	public function get_hijab_by_id($id)
	{
		return $this->db->where('id_hijab', $id)
						->get('data_hijab')
						->row();
	}

	public function tambah()
	{
		$data = array(
			'nama_hijab' => $this->input->post('nama_hijab'),
			'id_kategori' => $this->input->post('kategori'),
			'deskripsi' => $this->input->post('deskripsi'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok'),
		);
		$this->db->insert('data_hijab', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
			'nama_hijab' => $this->input->post('ubah_nama_hijab'),
			'id_kategori' => $this->input->post('ubah_kategori'),
			'deskripsi' => $this->input->post('ubah_deskripsi'),
			'harga' => $this->input->post('ubah_harga'),
			'stok' => $this->input->post('ubah_stok')
		);

		$this->db->where('id_hijab', $this->input->post('ubah_id_hijab'))
				->update('data_hijab', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_hijab', $this->input->post('hapus_id_hijab'))
			->delete('data_hijab');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file hijab_model.php */
/* Location: ./application/models/hijab_model.php */