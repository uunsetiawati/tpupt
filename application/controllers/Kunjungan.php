<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model("kunjungan_m");
    }

    function index()
    {
        $this->session->set_flashdata('warning', 'Inputan Anda Tidak Valid');
        redirect("");
    }

    /*
        CHECK IN
        Step 1 - Tentukan Lokasi        
        */
    function checkIn()
    {
        akses("tp");
        previllage("1", $this->session->tipe_user, "!=", "");

        // Cek Device Terdaftar
        $this->load->model("validation_m");
        $cekDevice = $this->validation_m->cekDevice($this->agent->agent_string(), $this->agent->platform(), $this->agent->browser());
        // if ($cekDevice->num_rows() == null and $this->session->tipe_user == "1") {
        //     $this->session->set_flashdata('danger', 'Hanya bisa update kunjungan di device terdaftar');
        //     redirect('');
        // }

        // Cek Izin
        $cekIzin = $this->kunjungan_m->getAllByTable("tb_izin", "user_id", $this->session->id, date("Y-m-d"));
        if ($cekIzin->num_rows() > 0) {
            $this->session->set_flashdata('danger', 'Anda sudah melakukan mengajukan izin hari ini. Selamat beristirahat.');
            redirect('');
        }

        //Maksimal input 1x per jam
        // $kunjungan_terakhir = $this->kunjungan_m->getByLatest(date("Y-m-d H"), $this->session->id);
        // if ($kunjungan_terakhir->num_rows() > 0) {
        //     $this->session->set_flashdata('danger', 'Maksimal Input 1x per jam. Masyarakat lebih senang jika mendapatkan pendampingan berkualitas.');
        //     redirect("");
        // }

        // Validasi perangkat yang digunakan
        // if ($this->agent->is_mobile() and $this->agent->mobile() != "Nexus") {
            previllage($this->session->tipe_user, "1", "!=", "kunjungan/data");
            $data['title'] = "CHECK IN LOKASI";
            $this->templateadmin->load('template/dashboard', 'kunjungan/lokasi', $data);
        // } else {
            // $this->session->set_flashdata('danger', 'Share loc hanya bisa melalui perangkat mobile');
            // redirect("");
        // }
    }

    /*
        Step 2 - Tambahkan data kunjungan awal
        Koperasi/UMKM/Wirausaha Pemula --> Isian (1)
        Kalau di Kantor --> Isian (2)
    */
    function addCheckIn()
    {
        previllage("1", $this->session->tipe_user, "!=", "");

        $this->load->library("maps");
        $post = $this->input->post(null, TRUE);

        // Agar tidak bisa check in di lokasi yang sama
        $kunjungan_terakhir = $this->kunjungan_m->getByLocation($post['lat'], $post['lng']);
        // if ($kunjungan_terakhir->num_rows() > 0) {
        //     $this->session->set_flashdata('danger', 'Anda Tidak bisa checkin di lokasi yang sama dalam sehari');
        //     redirect("");
        // }

        // Validasi menghindari injection. Alihkan jika posisi latitude dan longtitude tidak ada
        if ($post['lat'] == null or $post['lng'] == null) {
            $this->session->set_flashdata('danger', 'Mohon Share Loc Terlebih Dahulu');
            redirect("kunjungan/checkin");
        } else {
            //Load librarynya form
            $this->load->library('form_validation');
            //Atur validasinya
            $this->form_validation->set_rules('hp', 'hp', 'min_length[10]|max_length[18]');
            //Pesan yang ditampilkan
            $this->form_validation->set_message('is_unique', 'Data sudah ada');
            //Tampilan pesan error
            $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

            if ($this->form_validation->run() == FALSE or !isset($post['loc_img'])) {
                // Redirect agar tidak di hit langsung
                $post = $this->input->post(null, TRUE);

                $data['lat'] = $post['lat'];
                $data['lng'] = $post['lng'];
                $data['loc_img'] = $this->maps->saveMapsTmp($post['lat'], $post['lng']);
                $data['title'] = "ABSEN KUNJUNGAN";
                $this->templateadmin->load('template/dashboard', 'kunjungan/addCheckin', $data);
            } else {
                $post = $this->input->post(null, TRUE);

                //Input database sesuai tipe
                if ($post['tipe'] == "UKM" or $post['tipe'] == "KOPERASI" or $post['tipe'] == "CALON WIRAUSAHA") {
                    $this->kunjungan_m->addCheckInNonLainnya($post);
                    $this->kunjungan_m->addPoin("10", "kunjungan");
                } elseif ($post['tipe'] == "LAINNYA") {
                    $this->kunjungan_m->addCheckInLainnya($post);
                    $this->kunjungan_m->addPoin("5", "kekantor");
                }

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Check In Berhasil. Silahkan tambahkan data hasil kunjungan.');
                }
                redirect('kunjungan/data');
            }
        }
    }

    function data()
    {
        previllage("1", $this->session->tipe_user, "!=", "laporan");
        !isset($_GET['tahun']) ? $tahun = date("Y") : $tahun = $_GET['tahun'];
        !isset($_GET['bulan']) ? $bulan = date("m") : $bulan = $_GET['bulan'];

        $data['title'] = "Kegiatan BULAN " . $bulan . " / " . $tahun;
        $data['row'] = $this->kunjungan_m->getByMonth($tahun, $bulan, $this->session->id);
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;
        $data['laporan'] = $this->kunjungan_m->getLaporan($tahun, $bulan, $this->session->id);

        $this->templateadmin->load('template/dashboard', 'kunjungan/logData', $data);
    }

    function dataKunjungan()
    {
        $this->load->model("kunjungan_m");
        previllage("1", $this->session->tipe_user, "!=", "laporan");
        !isset($_GET['tahun']) ? $tahun = date("Y") : $tahun = $_GET['tahun'];
        !isset($_GET['bulan']) ? $bulan = date("m") : $bulan = $_GET['bulan'];

        $dataMonth = $this->kunjungan_m->getByMonth($tahun, $bulan, $this->session->id);
        $data['row'] = $dataMonth;
        $this->load->view("kunjungan/laporan/datatables", $data);
    }

    public function edit($id)
    {
        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('hp', 'hp', 'min_length[10]|max_length[16]');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->kunjungan_m->getAllBy("id", $id);
            isMe($query->row("user_id"), $this->session->id);

            // Ini perintah untuk Hanya Bisa di Edit di Hari yang sama
            // $tanggal = date("Ymd",strtotime($query->row("created")));
            // if ($tanggal != date("Ymd")) {
            //     $this->session->set_flashdata('danger', 'Mohon maaf waktu edit sudah berakhir');
            //     redirect("kunjungan/data");
            // }

            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $data['title'] = "HASIL KUNJUNGAN";

                if ($query->row("tipe") != "lainnya") {
                    $this->templateadmin->load('template/dashboard', 'kunjungan/updateHasilUKM', $data);
                } else {
                    $this->templateadmin->load('template/dashboard', 'kunjungan/updateHasilLainnya', $data);
                }
            } else {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
                echo "<script>window.location='" . site_url('kunjungan/data') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);

            //CEK FOTO SELFIE
            $config['upload_path']          = 'assets/files/foto_selfie/tmp/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['file_name']            = rand(0, 99999) . $this->session->id;
            $this->load->library('upload', $config);
            if (@$_FILES['foto_selfie']['name'] != null) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto_selfie')) {

                    // KOMPRESS IMAGE BIAR LEBIH RINGAN
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/files/foto_selfie/tmp/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = 'assets/files/foto_selfie/' . $gbr['file_name'];
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

                    $post['foto_selfie'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger', $pesan);
                    redirect('kunjungan/data');
                }
            }

            //CEK GAMBAR
            $config['upload_path']          = 'assets/files/foto_lokasi/tmp';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['file_name']            = rand(0, 99999) . $this->session->id;

            $this->load->library('upload', $config);
            if (@$_FILES['foto_lokasi']['name'] != null) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto_lokasi')) {

                    // KOMPRESS IMAGE BIAR LEBIH RINGAN
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/files/foto_lokasi/tmp/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = 'assets/files/foto_lokasi/' . $gbr['file_name'];
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

                    $post['foto_lokasi'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger', $pesan);
                    redirect('kunjungan/data');
                }
            }

            // test($post['tipe'] != "lainnya");
            if ($post['tipe'] == "lainnya") {
                $this->kunjungan_m->updateKunjunganLainnya($post);
            } else {
                $this->kunjungan_m->updateKunjunganNonLainnya($post);
            }

            if ($this->db->affected_rows() > 0) {
                if ($post['foto_lokasi'] != null) {
                    $this->kunjungan_m->addPoin("5", "melengkapifoto");
                }
                $this->session->set_flashdata('success', 'Berhasil Di Edit');
            }
            redirect('kunjungan/data');
        }
    }

    function addLaporan()
    {
        // Validasi waktu: Format Ymd (Dimulai,Berakhir,Dialihkan kemana)
        // timevalidation("20230101","20230115","kunjungan/data");
        if (date("d") > $this->fungsi->setting("addLaporanTP")->row("value")) {
            $this->session->set_flashdata('danger', 'Waktu penyimpanan yang telat belum dimulai');
            redirect();
        }

        // Khusus untuk TP
        previllage($this->session->tipe_user, "1", "!=", "target");

        $cek = $this->kunjungan_m->getLaporan(date("Y"), date("m"), $this->session->id);
        $cek->num_rows() != null ? redirect("kunjungan/data") : "";

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
            $data['title'] = "UPLOAD LAPORAN BULANAN";
            $this->templateadmin->load('template/dashboard', 'kunjungan/laporan/addLaporan', $data);
        } else {
            $post = $this->input->post(null, TRUE);

            // Tidak bisa tambah laporan jika checkin belum sejumlah 15
            $kunjungan_terakhir = $this->kunjungan_m->getByMonth($tahun, $bulan, $this->session->id);
            if ($kunjungan_terakhir->num_rows() < 14) {
                $this->session->set_flashdata('warning', 'Anda belum bisa upload Laporan Translok karena belum memenuhi syarat kunjungan minimal.');
                redirect("");
            }

            // SURAT TUGAS
            $config['upload_path']          = 'assets/files/laporan/surat_tugas/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 5000;
            $config['file_name']            = "SURATTUGAS-" . rand(0, 9999) . strtoupper($this->session->hp);

            $this->load->library('upload', $config);
            if (@$_FILES['surat_tugas']['name'] != null) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('surat_tugas')) {
                    $post['surat_tugas'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger', $pesan);
                    redirect('kunjungan/addLaporan');
                }
            }

            // spppd
            $config['upload_path']          = 'assets/files/laporan/sppd/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 5000;
            $config['file_name']            = "SPPD-" . rand(0, 9999) . strtoupper($this->session->hp);

            $this->load->library('upload', $config);
            if (@$_FILES['sppd']['name'] != null) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('sppd')) {
                    $post['sppd'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger', $pesan);
                    redirect('kunjungan/addLaporan');
                }
            }

            // SURAT KETERANGAN KUNJUNGAN
            $config['upload_path']          = 'assets/files/laporan/surat_kunjungan/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 5000;
            $config['file_name']            = "SURATLAPORANKUNJUNGAN-" . rand(0, 9999) . strtoupper($this->session->hp);

            $this->load->library('upload', $config);
            if (@$_FILES['surat_kunjungan']['name'] != null) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('surat_kunjungan')) {
                    $post['surat_kunjungan'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger', $pesan);
                    redirect('kunjungan/addLaporan');
                }
            }

            // LAPORAN KUNJUNGAN
            $config['upload_path']          = 'assets/files/laporan/laporan_kunjungan/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 5000;
            $config['file_name']            = "SURATTUGAS-" . rand(0, 9999) . strtoupper($this->session->hp);

            $this->load->library('upload', $config);
            if (@$_FILES['laporan_kunjungan']['name'] != null) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('laporan_kunjungan')) {
                    $post['laporan_kunjungan'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger', $pesan);
                    redirect('kunjungan/addLaporan');
                }
            }

            $this->kunjungan_m->addLaporan($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Laporan Terupload. Terima kasih.');
            }
            redirect('kunjungan/data');
        }
    }

    function izin()
    {
        // Cek sudah melakukan izin atau belum
        $cekIzin = $this->kunjungan_m->getAllByTable("tb_izin", "user_id", $this->session->id, date("Y-m-d"));
        if ($cekIzin->num_rows() > 0) {
            $this->session->set_flashdata('danger', 'Anda sudah melakukan mengajukan izin hari ini. Selamat beristirahat.');
            redirect('');
        }

        $this->kunjungan_m->saveIzin();
        $this->session->set_flashdata('success', 'Izin anda telah kami terima. Terima Kasih. Selamat beristirahat, semoga harimu menyenangkan.');
        redirect("kunjungan/data");
    }
}
