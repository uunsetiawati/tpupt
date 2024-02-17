<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Test extends CI_Controller
{
    public function __construct(){
		parent::__construct();
        $this->fungsi->saveAdminLog("Akses TEST");
	}

    function metaImage()
    {
        $exif = exif_read_data("https://tp.uptkukm.id/assets/files/foto_lokasi/tmp/38587112.jpg", 0, true);
        foreach ($exif as $key => $section) {
            foreach ($section as $name => $val) {
                echo "$key.$name: $val<br />\n";
            }
        }
    }

    function statistik()
    {
        // Berdasarkan kesuaian jurusan
        $this->load->model("statistik_m");
        $data['leaderboard'] = $this->statistik_m->leaderboardAll();
        
        $data['tahun'] = $_GET['tahun'];
        $data['bulan'] = $_GET['bulan'];
        $data['user_id'] = $_GET['token'];


        // isset($tahun) ? redirect("") : "";
        // isset($bulan) ? redirect("") : "";
        // isset($user_id) ? redirect("") : "";

        // $tahun = "2023";
        // $bulan = "01";
        // $user_id = "112";
        
        // Berdasarkan Jumlah Kunjungan Koperasi / UKM
        // $koperasi = $this->fungsi->loadDataLike2("tb_kunjungan","tipe","koperasi","created",date($tahun)."-".date($bulan),$user_id);
        // $ukm = $this->fungsi->loadDataLike2("tb_kunjungan","tipe","ukm","created",date($tahun)."-".date($bulan),$user_id);
        // Berdasarkan jumlah Kunjungan ke Kantor
        // $lainnya = $this->fungsi->loadDataLike2("tb_kunjungan","created",date($tahun)."-".date($bulan),"tipe","lainnya",$user_id);

        $this->load->view("test/statistik",$data);

    }
}
