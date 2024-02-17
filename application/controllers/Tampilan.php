<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('validation_m');
	}

	/*
		Template halaman login
	*/
	public function target()
	{		
        $data['title']="Target Kerja";
		$this->templateadmin->load('template/dashboard','target/draft/target_input',$data);
	}

    public function targetdata()
	{		
        $data['title']="Data Target Kerja";
		$this->templateadmin->load('template/dashboard','target/target_data',$data);
	}

	public function kunjunganinput()
	{		
        $data['title']="Data Target Kerja";
		$this->templateadmin->load('template/dashboard','kunjungan/draft/kunjungan_input',$data);
	}

	public function kunjunganeditukm()
	{		
        $data['title']="Form Edit Kunjungan";
		$this->templateadmin->load('template/dashboard','kunjungan/draft/kunjungan_edit_ukmkoperasi',$data);
	}

	public function kunjunganeditkantor()
	{		
        $data['title']="Form Edit Kunjungan";
		$this->templateadmin->load('template/dashboard','kunjungan/draft/kunjungan_edit_kantor',$data);
	}

	public function koordinatordata()
	{		
        $data['title']="DATA TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardkoor','koordinator/tp_data',$data);
	}

	public function koordinatorlaporan()
	{		
        $data['title']="LAPORAN TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardkoor','koordinator/laporankoor_data',$data);
	}

	public function koordinatorapprove()
	{		
        $data['title']="LAPORAN TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardkoor','koordinator/approve_data',$data);
	}

	public function koordinatordetail()
	{		
        $data['title']="LAPORAN TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardkoor','koordinator/detailkunjunganukm_data',$data);
	}

	public function dashboardadmin()
	{		
        $data['title']="DASHBOARD ADMIN";
		$this->templateadmin->load('template/dashboardadmin','page/berandaadmin',$data);
	}

	public function admindata()
	{		
        $data['title']="LAPORAN TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardadmin','admin/admin_data',$data);
	}

	public function admindetail()
	{		
        $data['title']="DETAIL LAPORAN TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardadmin','admin/admin_detail',$data);
	}

	public function profil()
	{		
        $data['title']="PROFIL";
		$this->templateadmin->load('template/dashboard','page/profil',$data);
	}

	public function uploadlaporan()
	{		
		//contoh SPPD, contoh SPT, Laporan Translok, Surat Keterangan Kunjungan
		$data['title']="UPLOAD LAPORAN";
		$this->templateadmin->load('template/dashboardadmin','laporan/tambah_laporan',$data);
	}

	function datatarget()
    {        
		check_not_login();
		akses("admin");
        $this->load->model("tampilan_m");
        // $dataMonth = $this->kunjungan_m->getByMonth(date("Y"),date("m"),$this->session->id);
        $data['row'] = $this->tampilan_m->gettarget();
        $this->load->view("test/datatarget",$data);
    }

	function izin()
    {        
		
        $data['title']="IZIN";
		$this->templateadmin->load('template/dashboardadmin','test/izin',$data);
    }

	function stats(){
		$data['title']="STATISTIK";
		$this->templateadmin->load('template/dashboardadmin','test/stats',$data);
	}

	function statsumum(){
		$data['title']="STATISTIK";
		$this->templateadmin->load('template/dashboardadmin','test/statsumum',$data);
	}



}
	