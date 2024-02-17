<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/

class Kunjungan_m extends CI_Model
{

    /* 
        Ambil Data Kunjungan berdasarkan Tabel dan Variable Tabel
        $this->kunjungan_m->getAllBy("nama tabel","variable tabel");
        $this->kunjungan_m->getAllBy("id","user_id");
    */
    function getAllBy($kolom = null, $id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($kolom != null && $id != null) {
            $this->db->where($kolom, $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getidentifikasi($kolom = null, $var = null, $user_id = null)
    {
        // $this->db->from('tb_target');
        
        // $query = $this->db->get();
        // return $query;

        $query= $this->db->select('t1.nama, t2.masalah, t3.kota')
                ->from('tb_user as t1')
                ->join('tb_kunjungan as t2','t1.id = t2.user_id')
                ->join('tb_lembaga as t3','t1.wilayah_kerja = t3.id')   
                ->where($kolom,$var)
                ->where('t2.user_id',$user_id)             
                ->get();
        return $query;

    }

    function getAllByType($type = null,$date = null, $id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($date != null && $id != null) {
            $this->db->like("created",$date);
            $this->db->where("user_id",$id);

        }
        $this->db->where("tipe",$type);
        $query = $this->db->get();
        return $query;
    }

    function getAllByTable($table = null,$kolom = null, $id = null,$tgl = null)
    {
        $this->db->from($table);
        if ($kolom != null && $id != null) {
            $this->db->where($kolom, $id);
        }
        
        if ($tgl != null){ $this->db->like("created",$tgl);}

        $query = $this->db->get();
        return $query;
    }

    /*
        Get Izin
    */
    function getIzinByDate($tahun = null, $bulan = null, $tanggal = null, $user_id = null)
    {
        $this->db->from('tb_izin');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun . "-" . $bulan . "-" . $tanggal);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }

    function getIzinByMonth($tahun = null, $bulan = null, $user_id = null)
    {
        $this->db->from('tb_izin');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun . "-" . $bulan);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }

    /*
        Get Terlambat
    */
    function getLateByDate($tahun = null, $bulan = null, $tanggal = null, $user_id = null)
    {
        $this->db->from('tb_late');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun . "-" . $bulan . "-" . $tanggal);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }

    function getLateByMonth($tahun = null, $bulan = null, $user_id = null)
    {
        $this->db->from('tb_late');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun . "-" . $bulan);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }

    /* 
        Ambil data berdasarkan Tahun Bulan dan Tanggal, kondisi tambahan bisa untuk masing-masing TP (User_id)
            1. getByDate (Tanggal) - ("tahun","bulan","tanggal","user_id | opsional")
            2. getByMonth (bulan) - ("tahun","bulan","user_id | opsional")
            3. getByYear (tahun) - ("tahun","user_id | opsional")
        Example :
        $this->kunjungan_m->getByDate("tahun","bulan","tanggal");
    */
    function getByDate($tahun = null, $bulan = null, $tanggal = null, $user_id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun . "-" . $bulan . "-" . $tanggal);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }
    function getByMonth($tahun = null, $bulan = null, $user_id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun . "-" . $bulan);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }
    function getByYear($tahun = null, $user_id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }
    function getByLatest($time = null, $user_id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $time);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }
    function getByLocation($lat,$lng)
    {
        $this->db->from('tb_kunjungan');
        $this->db->like('lat', substr($lat,"0","6"));
        $this->db->like('lng', substr($lng,"0","7"));
        $this->db->like('created', date("Y")."-".date("m")."-".date("d"));
        $this->db->where('user_id',$this->session->id);
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }

    /*
        Tambahkan Kunjungan
    */
    function addCheckInNonLainnya($post)
    {
        //Migrasi Gambar Peta dari TMP ke Storage Utama
        $params['loc_img'] =  $this->maps->saveMapsImg(FCPATH . $post['loc_img'], $this->session->hp);
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tipe'] =  $post['tipe'];
        $params['nama'] =  $post['nama'];
        $params['kelamin'] =  $post['kelamin'];
        $params['hp'] =  $post['hp'];
        $params['tujuan'] =  $post['tujuan'];
        $params['translok'] =  $post['translok'];
        $params['lat'] =  $post['lat'];
        $params['lng'] =  $post['lng'];
        $params['created'] =  date("Y-m-d H:i:s");
        $params['ip_address'] = $this->input->ip_address();
        $this->db->insert('tb_kunjungan', $params);
    }

    function addCheckInLainnya($post)
    {
        //Migrasi Gambar Peta dari TMP ke Storage Utama
        $params['loc_img'] =  $this->maps->saveMapsImg(FCPATH . $post['loc_img'], $this->session->hp);
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tipe'] =  $post['tipe'];
        $params['masalah'] =  $post['masalah'];
        $params['target'] =  $post['target'];
        $params['realisasi'] =  $post['realisasi'];
        $params['kegiatan'] =  $post['kegiatan'];
        $params['tujuan'] =  $post['tujuan'];
        $params['kesimpulan'] =  $post['kesimpulan'];
        $params['tindak_lanjut'] =  $post['tindak_lanjut'];
        $params['foto_selfie'] =  $post['foto_selfie'];
        $params['foto_lokasi'] =  $post['foto_lokasi'];
        $params['lat'] =  $post['lat'];
        $params['lng'] =  $post['lng'];
        $params['created'] =  date("Y-m-d H:i:s");
        $params['ip_address'] = $this->input->ip_address();
        $this->db->insert('tb_kunjungan', $params);
    }

    function addKunjungan($post)
    {
        //Migrasi Gambar Peta dari TMP ke Storage Utama
        $params['loc_img'] =  $this->maps->saveMapsImg(FCPATH . $post['loc_img'], $this->session->nik);
        //Input Data
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tipe'] =  $post['tipe'];
        $params['resume'] =  $post['resume'];
        $params['detail'] =  $post['detail'];
        $params['identifikasi'] =  $post['identifikasi'];
        $params['kegiatan'] =  $post['kegiatan'];
        $params['foto_selfie'] =  $post['foto_selfie'];
        $params['foto_lokasi'] =  $post['foto_lokasi'];
        $params['lat'] =  $post['lat'];
        $params['lng'] =  $post['lng'];
        $params['created'] =  date("Y-m-d H:i:s");
        $parms['ip_address'] = $this->input->ip_address();
        $this->db->insert('tb_kunjungan', $params);
    }

    function updateKunjunganNonLainnya($post)
    {
        //Id	  
        $params['id'] =  $post['id'];
        // Kebutuhan User
        $params['nama'] =  $post['nama'];
        $params['kelamin'] =  $post['kelamin'];
        $params['agama'] =  $post['agama'];
        $params['nik'] =  $post['nik'];
        $params['tempat_lahir'] =  $post['tempat_lahir'];
        $params['tgl_lahir'] =  $post['tgl_lahir'];
        $params['pendidikan'] =  $post['pendidikan'];
        $params['hp'] =  $post['hp'];
        $params['email'] =  $post['email'];
        $params['brand'] =  $post['brand'];
        $params['alamat'] =  $post['alamat'];
        $params['kota'] =  $post['kota'];
        $params['tahun_berdiri'] =  $post['tahun_berdiri'];
        $params['produk'] =  $post['produk'];
        $params['nik_koperasi'] =  $post['nik_koperasi'];
        $params['iumk'] =  $post['iumk'];
        $params['jabatan'] =  $post['jabatan'];
        $params['skala'] =  $post['skala'];
        $params['omset'] =  $post['omset'];
        $params['jumlah_karyawan'] =  $post['jumlah_karyawan'];
        $params['masalah'] =  $post['masalah'];
        $params['kebutuhan'] =  $post['kebutuhan'];
        $params['rekomendasi'] =  $post['rekomendasi'];
        //Cek foto
        if ($post['foto_selfie'] != null) {
            $params['foto_selfie'] =  $post['foto_selfie'];
        }
        if ($post['foto_lokasi'] != null) {
            $params['foto_lokasi'] =  $post['foto_lokasi'];
        }
        //End Cek foto
        $params['modified'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $params['id']);
        $this->db->update('tb_kunjungan', $params);
    }

    function updateKunjunganLainnya($post)
    {
        //Id	  
        $params['id'] =  $post['id'];
        // Kebutuhan User
        $params['masalah'] =  $post['masalah'];
        $params['target'] =  $post['target'];
        $params['realisasi'] =  $post['realisasi'];
        $params['kegiatan'] =  $post['kegiatan'];
        $params['tujuan'] =  $post['tujuan'];
        $params['kesimpulan'] =  $post['kesimpulan'];
        $params['tindak_lanjut'] =  $post['tindak_lanjut'];
        $params['keterangan'] =  $post['keterangan'];
        //Cek foto
        if ($post['foto_selfie'] != null) {
            $params['foto_selfie'] =  $post['foto_selfie'];
        }
        if ($post['foto_lokasi'] != null) {
            $params['foto_lokasi'] =  $post['foto_lokasi'];
        }
        //End Cek foto
        $params['modified'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $params['id']);
        $this->db->update('tb_kunjungan', $params);
    }

    function addSPPD($post)
    {
        $params['id'] = "";
        $params['user_id'] =  $this->session->id;
        $params['file'] =  $post['sppd'];
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_sppd', $params);
    }

    function updateSPPD($post)
    {
        $params['id'] =  $post['id'];
        if ($post['sppd'] != null) {
            $params['file'] =  $post['sppd'];
        } else {
            $params['file'] =  "";
        }
        $params['modified'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $params['id']);
        $this->db->update('tb_sppd', $params);
    }

    /*
        Hapus Kunjungan Menggunakan ID
    */
    function delete($id)
    {
        // Ambil Data ID
        $this->db->from('tb_kunjungan');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        // Hapus Gambar yang diinput
        $this->maps->deleteMapsImg($query->loc_img);
        // Hapus Data
        $this->db->where('id', $id);
        $this->db->delete('tb_kunjungan');
    }

    /////// TARGET KUNJUNGAN TAHUNAN ///////
    /*
        Secara default akan mengambil seluruh data di tabel target
        Gunakan variabel tahun dan user_id untuk memilah
        $this->kunjungan_m->getTarget("2022","user_id")
    */
    function getTarget($tahun = null, $id = null)
    {
        $this->db->from('tb_target');
        if ($tahun != null && $id != null) {
            $this->db->where("tahun", $tahun);
            $this->db->where("user_id", $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function addTargetTahunan($post)
    {
        $params['id'] = "";
        $params['tahun'] =  date("Y");
        $params['user_id'] =  $this->session->id;
        $params['file'] =  $post['file'];
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_target', $params);
    }

    function editTargetTahunan($post)
    {
        $params['id'] =  $post['id'];
        $params['target'] =  $post['target'];
        $this->db->where('id', $params['id']);
        $this->db->update('tb_target', $params);
    }

    function addRealisasiTahunan($post)
    {
        $params['id'] =  $post['id'];
        $params['realisasi'] =  $post['realisasi'];
        $params['modified'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $params['id']);
        $this->db->update('tb_target', $params);
    }

    function editRealisasiTahunan($post)
    {
        $params['id'] =  $post['id'];
        $params['realisasi'] =  $post['realisasi'];
        $this->db->where('id', $params['id']);
        $this->db->update('tb_target', $params);
    }

    function getLaporan($tahun = null,$bulan = null, $id = null)
    {
        $this->db->from('tb_laporan');
        $this->db->like("created", $tahun."-".$bulan);
        $this->db->where("user_id", $id);        
        $query = $this->db->get();
        return $query;
    }

    function addLaporan($post)
    {
        $params['id'] = "";
        $params['user_id'] =  $this->session->id;
        $params['wilayah_kerja'] =  $this->session->wilayah_kerja;
        $params['tahun'] =  date("Y");
        $params['bulan'] =  date("m");
        $params['surat_tugas'] =  $post['surat_tugas'];
        $params['sppd'] =  $post['sppd'];
        $params['surat_kunjungan'] =  $post['surat_kunjungan'];
        $params['laporan_kunjungan'] =  $post['laporan_kunjungan'];
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_laporan', $params);
    }

    /////// LIST LEMBAGA ///////
    function getLembaga($id = null)
    {
        $this->db->from('tb_lembaga');
        if ($id != null) {
            $this->db->where("id", $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function addPoin($poin = null, $source = null, $ket = null)
    {
        $params['user_id'] = $this->session->id;
        $params['wilayah_kerja'] = $this->session->wilayah_kerja;
        $params['tipe'] = "add";
        $params['source'] = $source;
        $params['poin'] = $poin;
        $params['keterangan'] = $ket;
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_leaderboard', $params);
    }

    function leaderboard($wilayah_kerja)
    {
        $query = $this->db->query("
        SELECT user_id,wilayah_kerja,
        SUM(poin) AS total_score
        FROM tb_leaderboard WHERE wilayah_kerja = ".$wilayah_kerja." AND YEAR(created) = 2024
        GROUP BY user_id
        ORDER BY SUM(poin) DESC");
        return $query;
    }

    function saveLate($id = null,$ket = null)
    {
        $params['user_id'] = $id;
        $params['keterangan'] = $ket;
        $params['token'] = $this->agent->agent_string();
        $params['ip_address'] = $this->input->ip_address();
        $params['referrer'] = $this->agent->referrer();
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_late', $params);
    }

    function saveIzin()
    {
        $params['user_id'] = $this->session->id;
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_izin', $params);
    }
}
