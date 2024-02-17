<?php

use Monolog\Handler\IFTTTHandler;

ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Target extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model("kunjungan_m");
	}
	
	function index()
	{
		//Cek Hak Akses
		$akses = $this->session->tipe_user;
		// test($akses);
		if ($akses == "1"){
			//Cek Sudah Isi atau Belum
			$cek = $this->kunjungan_m->getTarget(date("Y"),$this->session->id);
			if ($cek->num_rows() != null){
				//Larikan ke halaman sudah upload
				redirect("target/data/");
			} else {
				//Larikan ke halaman upload
				redirect("target/tambah/");
			}
		} elseif ($akses == "2") {
			redirect("target/data/");
		}		
	}
	
	function tambah()
	{
		// Validasi waktu: Format Ymd (Dimulai,Berakhir,Dialihkan kemana)
		timevalidation("20240101","20240228","target/data");
		// Khusus untuk TP
		previllage($this->session->tipe_user,"1","!=","target");

		$cek = $this->kunjungan_m->getTarget(date("Y"),$this->session->id);
		$cek->num_rows() != null ? redirect("target") : "";
		
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|is_unique[tb_modul.judul]|max_length[50]');
		
		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "TAMBAH RENCANA KERJA";
			$this->templateadmin->load('template/dashboard', 'target/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			
			//CEK FILES
			$config['upload_path']          = 'assets/files/target_tahunan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 5000;
			$config['file_name']            = "TARGETTAHUNAN-".rand(0,9999).strtoupper($this->session->hp);
			
			$this->load->library('upload', $config);
			if (@$_FILES['file']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('file')) {
					$post['file'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('target/tambah');
				}
			}
			
			$this->kunjungan_m->addTargetTahunan($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Target Berhasil di Tambahkan');
			}
			redirect('target/data');
		}
	}
	
	
	/*
	Controller untuk membuka, mendownload, dan mencetak laporan akhir
	*/
	function perintah()
	{
		$data['perintah'] = $_GET['aksi']; 
		$data['tahun'] = $_GET['tahun']; 
		$data['user_id'] = base64_decode($_GET['token']); 
		!isset($data) ? redirect("") : "";
		// Cek apakah sudah upload atau belum
		$file = $this->kunjungan_m->getTarget($data['tahun'],$data['user_id']);
		$filecontents = "/assets/files/target_tahunan/" . $file->row("file");
		// Buka sesuai metode
		if ($file->num_rows() > 0){
			if ($data['perintah'] == "open"){
				$data['title'] = "Open";
				$data['url'] = base_url().$filecontents;
				$this->load->view('target/open',$data);
			} elseif ($data['perintah'] == "download"){
				redirect("".$filecontents);
				echo "Download file";				
			} elseif ($data['perintah'] == "print"){
				exec(FCPATH . $filecontents);
				redirect("target/data");
			}
		} else {
			$this->session->set_flashdata('danger', "Belum mengupload file rencana kerja tahunan");
			redirect("target/data");
		}
	}
	
}
