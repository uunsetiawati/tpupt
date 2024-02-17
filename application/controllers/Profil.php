<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('user_m');
	}

	public function index()
	{
		redirect("page/profil","refresh");
	}

	public function edit($id)
	{
		//Mencegah user yang bukan haknya
		isMe($this->session->id, $this->uri->segment(3));
		
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[50]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[10]|is_unique[tb_user.hp]|max_length[20]|alpha_dash');
		$this->form_validation->set_rules('email', 'email', 'is_unique[tb_user.email]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');

		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['title'] = "Edit PROFIL";
				$this->templateadmin->load('template/dashboard', 'profil/edit', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('user') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			
			//CEK GAMBAR
			$config['upload_path']          = 'assets/files/foto_profil/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['file_name']            = strtoupper($post['nama']) . '--' . $post['hp'];

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
				if ($this->upload->do_upload('foto')) {
					$itemfoto = $this->user_m->get($post['id'])->row();
					if ($itemfoto->foto != null) {
						$target_file = 'assets/files/foto_profil/' . $itemfoto->foto;
						unlink($target_file);
					}

					$post['foto'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('profil/edit/' . $id);
				}
			}

			$this->user_m->updateProfil($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('page/profil');
		}
	}

	function hapusfoto()
	{
		//Mencegah user yang bukan haknya
		isMe($this->session->id, $this->uri->segment(3));

		$id = $this->uri->segment(3);

		//Action          
		$this->load->model('user_m');
		$itemfoto = $this->user_m->get($id)->row();
		if ($itemfoto->foto != null) {
			$target_file = 'assets/files/foto_profil/' . $itemfoto->foto;
			unlink($target_file);
		}
		$params['foto'] = null;
		$this->db->where('id', $id);
		$this->db->update('tb_user', $params);
		redirect('profil/edit/' . $id);
	}
}
