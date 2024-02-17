<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$this->load->model("user_m");

		// Redirect jika password masih default
		$this->load->model("validation_m");
		$password = $this->user_m->getAllBy("id", $this->session->id)->row("password");
		if ($password == sha1("12345678")) {
			redirect("pengaturan/setPassword");
		}

		// Aktifkan harus pilih bidang dulu
		$bidang = $this->user_m->get($this->session->id)->row("bidang");
		if (!isset($bidang) and $this->session->tipe_user == "1") {
			redirect("pengaturan/setBidang");
		}

		// Aktifkan harus setting profil terlebih dahulu
		$setProfil = $this->user_m->get($this->session->id);
		if ($setProfil->row("domisili") == null and $this->session->tipe_user == "1") {
			redirect("profil/edit/" . $this->session->id);
		}

		// Menampilkan data Leaderboard
		$this->load->model("kunjungan_m");
		$data['leaderboard'] = $this->kunjungan_m->leaderboard($this->session->wilayah_kerja);

		// Data Rekam Trayek Harian (Untuk Keperluan Maps Titik per Lokasi)
		$dataMonth = $this->kunjungan_m->getByMonth(date("Y"), date("m"), $this->session->id);
		if ($dataMonth != null) {
			$data['center'] = $dataMonth->row("lat") . "," . $dataMonth->row("lng");
			$datamarker = "";
			foreach ($dataMonth->result() as $key => $x) {
				$datamarker = $datamarker . "markers=size:mid%7Ccolor:0xff0000%7Clabel:0%7C" . $x->lat . "%2C" . $x->lng . "|&";
			}
			$data['markers'] = $datamarker;
		}

		$data['device'] = $this->validation_m->cekDevice($this->agent->agent_string(), $this->agent->platform(), $this->agent->browser());
		$data['kunjungan'] = $dataMonth;

		// Data Statistik
		$data['k_lainnya'] = $this->kunjungan_m->getAllByType("lainnya", date("Y") . "-" . date("m"), $this->session->id);
		$data['k_ukm'] = $this->kunjungan_m->getAllByType("ukm", date("Y") . "-" . date("m"), $this->session->id);
		$data['k_koperasi'] = $this->kunjungan_m->getAllByType("koperasi", date("Y") . "-" . date("m"), $this->session->id);
		$data['k_terlambat'] = $this->kunjungan_m->getLateByMonth(date("Y"), date("m"), $this->session->id);
		$data['k_terlambat_total'] = $this->kunjungan_m->getAllByTable("tb_late", "user_id", $this->session->id);
		$data['k_izin'] = $this->kunjungan_m->getIzinByMonth(date("Y"), date("m"), $this->session->id);
		$data['k_izin_total'] = $this->kunjungan_m->getAllByTable("tb_izin", "user_id", $this->session->id);

		// Data Postingan Instagram Terbaru
		$this->db->order_by("created", "DESC");
		$this->db->limit("5", "0");
		$data['ig'] = $this->fungsi->pilihan("tb_ig");

		// test($data['ig']->row("url"));

		$data['s_izin'] = $this->kunjungan_m->getIzinByDate(date("Y"), date("m"), date("d"), $this->session->id);
		$data['total_jarak'] = $this->fungsi->totalJarak($this->session->id);
		$data['title'] = "KITAPKU APPS";
		$this->templateadmin->load('template/dashboard', 'page/beranda/' . $this->session->tipe_user, $data);
	}
}
