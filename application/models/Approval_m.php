<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/

class Approval_m extends CI_Model
{
    /* 
        Ambil data berdasarkan Tahun Bulan dan Tanggal, kondisi tambahan bisa untuk masing-masing TP (User_id) dan Tambahkan buat (Koordinator TP)
            1. getByDate (Tanggal) - ("tahun","bulan","tanggal","user_id | opsional","koordinator_id | opsional")
            2. getByMonth (bulan) - ("tahun","bulan","user_id | opsional","koordinator_id | opsional")
            3. getByYear (tahun) - ("tahun","user_id | opsional","koordinator_id | opsional")
        Example :
        $this->turus_m->getByDate("tahun","bulan","tanggal");
    */
    function getByDate($tabel = null,$tahun = null, $bulan = null, $tanggal = null, $tp = null,$koordinator = null)
    {
        $this->db->from('tb_'.$tabel);
        if ($tp != null) { $this->db->where('tp', $tp); }
        if ($koordinator != null) { $this->db->where('koordinator', $koordinator); }
        $this->db->like('tgl', $tahun . "-" . $bulan . "-" . $tanggal);
        $this->db->order_by('created', "asc");
        $query = $this->db->get();
        return $query;
    }
    function getByMonth($tabel = null, $tahun = null, $bulan = null, $tp = null,$koordinator = null)
    {
        $this->db->from('tb_'.$tabel);
        if ($tp != null) { $this->db->where('tp', $tp); }
        if ($koordinator != null) { $this->db->where('koordinator', $koordinator); }
        $this->db->like('tgl', $tahun . "-" . $bulan);
        $this->db->order_by('created', "asc");
        $query = $this->db->get();
        return $query;
    }
    function getByYear($tabel = null, $tahun = null, $tp = null,$koordinator = null)
    {
        $this->db->from('tb_'.$tabel);
        if ($tp != null) { $this->db->where('tp', $tp); }
        if ($koordinator != null) { $this->db->where('koordinator', $koordinator); }
        $this->db->like('tgl', $tahun);
        $this->db->order_by('created', "asc");
        $query = $this->db->get();
        return $query;
    }

    function addTurus($post)
    {
        $params['id'] = "";
        $params['tp'] =  $this->session->id;
        $params['tgl'] =  $post['tgl'];
        $params['wilayah_kerja'] =  $this->session->wilayah_kerja;
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_turus', $params);
    }
    
    function accTurus($id)
    {
        //Ambil Data ID
        $this->db->from('tb_turus');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        //Ganti Status ACC
        $params['id'] =  $id;
        $params['koordinator'] =  $this->session->id;
        $params['status'] =  "setuju";
        $params['accepted'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $params['id']);
        $this->db->update('tb_turus', $params);
        //Insert Datasesuai tanggal pada turus
        $data['id'] =  "";
        $data['user_id'] =  $this->session->id;
        $data['created'] =  $query->tgl;
        $this->db->insert('tb_kunjungan', $data);
    }

    function delTurus($id)
    {
        $params['id'] =  $id;
        $params['status'] =  "batal";
        $this->db->where('id', $params['id']);
        $this->db->update('tb_turus', $params);
    }

    /*
        Modul untuk ACC Laporan Per Bulan
    */
    function accLaporan($tp)
    {
        // Menambahkan riwayat model
        $params['id'] = "";
        $params['tp'] =  $tp;
        $params['koordinator'] =  $this->session->id;
        $params['wilayah_kerja'] =  $this->session->wilayah_kerja;
        $params['tgl'] =  date("Ymd");
        $params['created'] =  date("Y-m-d H:i:s");
        $this->db->insert('tb_approval', $params);        
    }
    
}
