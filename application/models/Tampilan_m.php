<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/

class Tampilan_m extends CI_Model
{

    
    /////// LIST LEMBAGA ///////
    function gettarget()
    {
        // $this->db->from('tb_target');
        
        // $query = $this->db->get();
        // return $query;

        $query= $this->db->select('t1.nama, t1.hp, t3.kota')
                ->from('tb_user as t1')
                ->join('tb_target as t2','t1.id = t2.user_id')
                ->join('tb_lembaga as t3','t1.wilayah_kerja = t3.id')                
                ->get();
        return $query;

    }

    
}
