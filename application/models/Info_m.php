<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_info');
		if ($id != null) {
			$this->db->where('id', $id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function get_info($limit, $start)
	{
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get('tb_info', $limit, $start);
		return $query;
	}

	function simpan($post)
	{
		if ($post['judul'] == "") {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('error', 'Ojo Main refresh ae bat...');
			redirect('info/tambah');
		}

		$params['id'] =  "";
		$params['judul'] =  ucwords($post['judul']);
		$params['deskripsi'] =  $post['deskripsi'];
		$params['foto'] =  $post['foto'];
		$params['user_id'] =  $this->session->id;
		$params['created'] =  date("Y-m-d H:i:s");

		$this->db->insert('tb_info', $params);
	}

	function update($post)
	{

		$params['id'] =  $post['id'];
		$params['judul'] =  ucwords($post['judul']);
		$params['deskripsi'] =  $post['deskripsi'];
		if (isset($post['file'])) {
			$params['file'] =  $post['file'];
		}
		$params['user_id'] =  $this->session->id;
		$params['created'] =  date("Y-m-d H:i:s");

		if (isset($post['foto'])) {
			$params['foto'] =  $post['foto'];
		}

		$this->db->where('id', $params['id']);
		$this->db->update('tb_info', $params);
	}

	function hapus($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('tb_info');
	}
}
