<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/

class Statistik_m extends CI_Model
{

    // Data Leaderboard
    function leaderboardAll()
    {
        $query = $this->db->query("
        SELECT user_id,
        SUM(poin) AS total_score
        FROM tb_leaderboard
        GROUP BY user_id
        ORDER BY SUM(poin) DESC");
        return $query;
    }

    function leaderboardDaerah($wilayah_kerja)
    {
        $query = $this->db->query("
        SELECT user_id,wilayah_kerja,
        SUM(poin) AS total_score
        FROM tb_leaderboard WHERE wilayah_kerja = ".$wilayah_kerja."
        GROUP BY user_id
        ORDER BY SUM(poin) DESC");
        return $query;
    }

}
