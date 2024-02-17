<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model("validation_m");
	}

	public function setDevice()
	{
		// timevalidation("20230103","20230109","");

		$data['title'] = "Set Device";
		$data['row'] = $this->validation_m->cekDevice();
		$this->templateadmin->load('template/dashboard','pengaturan/setDevice',$data);
	}

	function saveDevice()
	{
		//Set waktu untuk aktif
		// timevalidation("20230103","20230109","");

		$device = $this->validation_m->cekDevice();
		$thisDevice = $this->validation_m->cekDevice($this->agent->agent_string(),$this->agent->platform(),$this->agent->browser());
		if ($this->agent->mobile() == "Nexus"){
			$this->session->set_flashdata('danger', 'Tidak Boleh menggunakan emulator');
			redirect("pengaturan/setDevice");
		} elseif ($device->num_rows() >= 5) {
			$this->session->set_flashdata('danger', 'Device Sudah Yang di Daftarkan Telah Melebihi Batas Quota');
			redirect("pengaturan/setDevice");
		} elseif ($thisDevice->num_rows() > 0) {
			$this->session->set_flashdata('danger', 'Device Sudah Terdaftar');
			redirect("pengaturan/setDevice");
		} else {
			$this->validation_m->saveDevice();
			$this->session->set_flashdata('success', 'Device Berhasil di Daftarkan.');
			redirect("pengaturan/setDevice");
		}
	}

	function setPassword()
	{
		$this->load->model("user_m");
		//Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[8]|max_length[50]');
        //Pesan yang ditampilkan
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_m->getAllBy("id", $this->session->id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $data['title'] = "EDIT PASSWORD";
				$this->templateadmin->load('template/dashboard', 'pengaturan/editPassword', $data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
                echo "<script>window.location='" . site_url('dashboard') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->setPassword($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Password Berhasil Di Edit');
            }
            redirect('dashboard');
        }
	}

	function setBidang()
	{
		$this->load->model("user_m");
		//Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[8]|max_length[50]');
        //Pesan yang ditampilkan
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_m->getAllBy("id", $this->session->id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $data['title'] = "PILIH BIDANG";
				$this->templateadmin->load('template/dashboard', 'pengaturan/setBidang', $data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
                echo "<script>window.location='" . site_url('dashboard') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->setBidang($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Anda telah berhasil memilih bidang');
            }
            redirect('dashboard');
        }
	}
}
