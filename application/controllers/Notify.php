<?php

use Monolog\Handler\IFTTTHandler;

ob_start();

defined('BASEPATH') or exit('No direct script access allowed');
class Notify extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library("wa");
    }

    function index()
    {
        redirect("");
    }

    function saveLate()
    {
        // die();
        $this->fungsi->saveAdminLog("Simpan Telat");

        if (date("H") < $this->fungsi->setting("jamTelat")->row("value")) {
            $this->session->set_flashdata('danger', 'Waktu penyimpanan yang telat belum dimulai');
            redirect();
        }

        $token = $_GET['token'];
        if ($token != sha1($this->fungsi->setting("token")->row("value"))) {
            $this->session->set_flashdata('danger', 'Ayolah ' . $this->input->ip_address() . ' jangan di hit lagi dong.');
            redirect();
        }

        $cekInput = $this->fungsi->loadDataLike1("tb_late", "created", date("Y") . "-" . date("m") . "-" . date("d"));
        if ($cekInput->num_rows() > 0) {
            $this->session->set_flashdata('danger', 'Catatan telat sudah di Input');
            redirect("laporan/listDaerah");
        }

        $this->load->model("user_m");
        $this->load->model("kunjungan_m");
        $dataUser = $this->user_m->getAllby("tipe_user", "1");
        foreach ($dataUser->result() as $key => $data) {
            $dataLogin = $this->kunjungan_m->getByDate(date("Y"), date("m"), date("d"), $data->id);
            $dataIzin = $this->kunjungan_m->getAllByTable("tb_izin", "user_id", $data->id, date("Y-m-d"));
            if ($dataLogin->num_rows() == null and $dataIzin->num_rows() == null) {
                echo $data->nama . " Telat melakukan checkin pada " . date("d - m - Y H : i : s") . "<br>";
                $this->kunjungan_m->saveLate($data->id, "telat check in");
            }
        }
    }

    function waLate()
    {
        // die();
        $this->fungsi->saveAdminLog("Chat Telat");

        if (date("H") < $this->fungsi->setting("jamWa")->row("value")) {
            $this->session->set_flashdata('danger', 'Waktu penyimpanan yang telat belum dimulai');
            redirect();
        }

        $token = $_GET['token'];
        if ($token != sha1($this->fungsi->setting("token")->row("value"))) {
            $this->session->set_flashdata('danger', 'Ayolah ' . $this->input->ip_address() . ' jangan di hit lagi dong.');
            redirect();
        }

        $this->load->model("user_m");
        $this->load->model("kunjungan_m");
        $dataUser = $this->user_m->getAllby("tipe_user", "1");
        foreach ($dataUser->result() as $key => $data) {
            $dataLogin = $this->kunjungan_m->getByDate(date("Y"), date("m"), date("d"), $data->id);
            $dataIzin = $this->kunjungan_m->getAllByTable("tb_izin", "user_id", $data->id, date("Y-m-d"));
            if ($dataLogin->num_rows() == null and $dataIzin->num_rows() == null) {
                $kalimat = "*[KAMU BELUM CHECK IN KUNJUNGAN HARI INI]* \n\nHalo, " . $data->nama . " Terhitung pada " . date("d-m-Y H:i:s") . " kamu belum melakukan checkin kunjungan. Segera melaporkan kegiatan hari ini, terima kasih. \n\n\n https://tp.upktukm.id\n_Sistem Otomatis oleh TIM IT UPT_";
                // echo $kalimat . "</br>";
                $this->wa->send($data->hp, $kalimat);
                sleep(0.7); // this should halt for 3 seconds for every loop
            }
            ob_flush();
            flush();
        }
    }

    function waFitrah()
    {
        die();
        $this->fungsi->saveAdminLog("WA Fitrah");

        $token = $_GET['token'];
        if ($token != "3847de719aa1d918d17dbd1f54193873e8f6f317") {
            $this->session->set_flashdata('danger', 'Ayolah ' . $this->input->ip_address() . ' jangan di hit lagi dong.');
            redirect();
        }
        $this->load->model("user_m");
        $this->load->model("kunjungan_m");
        $dataUser = $this->user_m->getAllby("tipe_user", "1");
        $no = 1;
        $pengguna = "";
        foreach ($dataUser->result() as $key => $data) {
            $dataLogin = $this->kunjungan_m->getByDate(date("Y"), date("m"), date("d"), $data->id);
            $dataIzin = $this->kunjungan_m->getAllByTable("tb_izin", "user_id", $data->id, date("Y-m-d"));
            if ($dataLogin->num_rows() == null and $dataIzin->num_rows() == null) {
                $pengguna = $pengguna . $no++ . ". " . $data->nama . " Belum login pada " . date("d-m-Y H:i:s") . "\n";
            }
        }
        $kalimat = "*[LIST YANG BELUM CHECK IN KUNJUNGAN HARI INI]*\n\n" . $pengguna;
        $this->wa->send("081231390340", $kalimat);
        if (date("H") > "18") {
            $this->wa->send("085235142348", $kalimat);
            $this->wa->send("085746706296", $kalimat);
        }
    }
}
