<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('info_m');
	}

	public function index()
	{
		$data['title'] = "Info Terbaru";

		//Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('info/index');
		$config['total_rows'] = $this->info_m->get()->num_rows();
		$config['per_page'] = 5;
		//Halaman
		$config['start'] = $this->uri->segment(3);
		$config['full_tag_open'] = '<ul class="pagination">';        
		$config['full_tag_close'] = '</ul>';        
		$config['first_link'] = 'First';        
		$config['last_link'] = 'Last';        
		$config['first_tag_open'] = '<li class="page-item"><a class="page-link">';        
		$config['first_tag_close'] = '</a></li>';        
		$config['prev_link'] = '&laquo';        
		$config['prev_tag_open'] = '<li class="page-item"><a class="page-link">';        
		$config['prev_tag_close'] = '</a></li>';        
		$config['next_link'] = '&raquo';        
		$config['next_tag_open'] = '<li class="page-item"><a class="page-link">';        
		$config['next_tag_close'] = '</a></li>';        
		$config['last_tag_open'] = '<li class="page-item"><a class="page-link">';        
		$config['last_tag_close'] = '</a></li>';        
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
		$config['cur_tag_close'] = '</a></li>';        
		$config['num_tag_open'] = '<li class="page-item"><a class="page-link">';        
		$config['num_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		//Mulai
		$data['row'] = $this->info_m->get_info($config['per_page'], $config['start']);

		$this->templateadmin->load('template/dashboard', 'info/info_data', $data);
	}

	public function detail($id)
	{
		$query = $this->info_m->get($id);
		if ($query->num_rows() > 0) {
			$data['data'] = $query->row();
			$data['title'] = "Detail Info";
			$this->templateadmin->load('template/dashboard', 'info/info_detail', $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='" . site_url('info') . "';</script>";
		}
	}

	public function tambah()
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|is_unique[tb_info.judul]|max_length[200]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Tambah Data info";
			$data['header_script'] = "summernote-header";
			$data['footer_script'] = "summernote-footer";
			$this->templateadmin->load('template/dashboard', 'info/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);

			//CEK GAMBAR
			$config['upload_path']          = 'assets/files/foto_info/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['file_name']            = $this->session->id."-".date("ymdhsi");

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('info/tambah');
				}
			}

			$this->info_m->simpan($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Publish');
			}
			redirect('info');
		}
	}

	public function edit($id)
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|max_length[200]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->info_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['title'] = "Edit Data info";
				$data['header_script'] = "summernote-header";
				$data['footer_script'] = "summernote-footer";
				$this->templateadmin->load('template/tanpa-buttom', 'info/edit', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('info') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);

			//CEK GAMBAR
			$config['upload_path']          = 'assets/files/foto_info/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['file_name']            = $this->session->id."-".date("ymdhsi");

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('info/tambah');
				}
			}

			$this->info_m->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('info');
		}
	}

	function hapusfoto()
	{
		$id = $this->uri->segment(3);
		//Action		  
		$itemfoto = $this->info_m->get($id)->row();
		if ($itemfoto->foto != null) {
			$target_file = 'assets/files/foto_info/' . $itemfoto->foto;
			unlink($target_file);
		}
		$params['foto'] = "";
		$this->db->where('id', $id);
		$this->db->update('tb_info', $params);
		redirect('info/edit/' . $id);
	}

	function hapusfile()
	{
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user, $previllage);
		// check_right_user($this->session->id, $this->fungsi->pilihan("tb_info", $id)->row("user_id"), $this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);


		//Action		  
		$itemfile = $this->info_m->get($id)->row();
		if ($itemfile->file != null) {
			$target_file = 'assets/files/foto_info/' . $itemfile->file;
			unlink($target_file);
		}
		$params['file'] = "";
		$this->db->where('id', $id);
		$this->db->update('tb_info', $params);
		redirect('info/edit/' . $id);
	}

	function hapus()
	{
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user, $previllage);
		// check_right_user($this->session->id, $this->fungsi->pilihan("tb_info", $id)->row("user_id"), $this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);

		$itemfoto = $this->info_m->get($id)->row();
		if ($itemfoto->foto != null) {
			$target_file = 'assets/files/foto_info/' . $itemfoto->foto;
			unlink($target_file);
		}

		$iteminfo = $this->info_m->get($id)->row();
		if ($iteminfo->file != null) {
			$target_file = 'assets/files/foto_info/' . $iteminfo->file;
			unlink($target_file);
		}

		$this->info_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('info');
	}
}
