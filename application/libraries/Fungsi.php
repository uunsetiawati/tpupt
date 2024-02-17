<?php 

class Fungsi {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('user_m');
		$userid = $this->ci->session->userdata('id');
		$query = $this->ci->user_m->get($userid)->row();
		return $query;
	}

	function tipe_user($tipe = null) {
		if ($tipe != null) {
			$tipe_user = $tipe;
		} else {
			$tipe_user = $this->ci->session->userdata('tipe_user');			
		}
		$this->ci->db->from('tb_tipe_user');
		$this->ci->db->where('id',$tipe_user);
		$query = $this->ci->db->get();
		return $query;
	}

	function setting($kode) {
		$this->ci->db->from('setting');
		$this->ci->db->where('kode',$kode);
		$query = $this->ci->db->get();
		return $query;
	}

	function status($tipe_user) {
		$this->ci->db->from('tb_tipe_user');
		$this->ci->db->where('id',$tipe_user);
		$query = $this->ci->db->get()->row("deskripsi");
		return $query;
	}

	function nama($id) {
		$this->ci->db->from('tb_user');
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get()->row("nama");
		return $query;
	}

	function timeToStr($tipe = null, $value = null)
    {
        $tanggal = date($tipe,strtotime($value));
        return $tanggal;
    }

	function pilihan($tabel) {		
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_selected($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get();
		return $query;
	}

	function pilihan_advanced($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_advanced_2($tabel,$kode,$id,$kode2,$id2) {		
		$this->ci->db->where($kode,$id);
		$this->ci->db->where($kode2,$id2);
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function loadbymonth($tabel, $user_id, $tahun = null,$bulan = null)
	{
		$this->ci->db->from($tabel);
		$this->ci->db->where("user_id",$user_id);
		$this->ci->db->like("created",$tahun."-".$bulan);
		$query = $this->ci->db->get();
		return $query;
	}
	
	function loadDataLike1($tabel,$kode,$id,$user_id = null) {		
		$this->ci->db->like($kode,$id);
		if ($user_id != null){$this->ci->db->where("user_id",$user_id);};
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function loadDataLike2($tabel,$kode,$id,$kode2,$id2,$user_id = null) {		
		$this->ci->db->like($kode2,$id2);
		if ($user_id != null){$this->ci->db->where("user_id",$user_id);};
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function loadDataLike3($tabel,$kode,$id,$kode2,$id2,$kode3,$id3,$user_id = null) {		
		$this->ci->db->like($kode3,$id3);
		if ($user_id != null){$this->ci->db->where("user_id",$user_id);};
		$this->ci->db->where($kode,$id);
		$this->ci->db->where($kode2,$id2);
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function getPoin($user_id,$tahun = null,$bulan = null)
	{
		$this->ci->db->select_sum('poin');
		$this->ci->db->where("user_id",$user_id);
		$this->ci->db->like("created",$tahun."-".$bulan);
		$query = $this->ci->db->get('tb_leaderboard');
		return $query;
	}

	function getPoinTahun($user_id,$tahun = null)
	{
		$this->ci->db->select_sum('poin');
		$this->ci->db->where("user_id",$user_id);
		$this->ci->db->like("created",$tahun);
		$query = $this->ci->db->get('tb_leaderboard');
		return $query;
	}

	function getPoinCustom($kolom = null,$value = null,$tahun = null,$bulan = null)
	{
		$this->ci->db->select_sum('poin');
		$this->ci->db->where($kolom,$value);
		$this->ci->db->like("created",$tahun."-".$bulan);
		$query = $this->ci->db->get('tb_leaderboard');
		return $query;
	}
	
	function saveAdminLog($keterangan)
	{
		$params['id'] =  "";
		$params['ip_address'] = $this->ci->input->ip_address();
		$params['token'] = $this->ci->agent->agent_string();
		$params['platform'] = $this->ci->agent->platform();
		$params['browser'] = $this->ci->agent->browser();
		$params['tujuan'] = current_url();
		$params['referrer'] = $this->ci->agent->referrer();
		$params['keterangan'] = $keterangan;
		$params['created'] =  date("Y-m-d H:i:s");
		$this->ci->db->insert('tb_log_admin', $params);
	}
	
	function totalJarak($id = null)
	{
		$this->ci->load->model("kunjungan_m");
		$this->ci->load->model("validation_m");
		// Total Jarak
		$data = $this->ci->kunjungan_m->getByMonth(date("Y"), date("m"), $id);        
        $no = 0;
		$totalJarak = 0;
        $point1 = array("lat" => $data->row('lat'), "lng" => $data->row('lng'));        
        foreach ($data->result() as $key => $data) {
            if ($no != null){
			$point2 = array("lat" => $data->lat, "lng" => $data->lng);
            $perbedaanJarak = $this->ci->validation_m->hitungJarak($point1['lat'],$point1['lng'],$point2['lat'],$point2['lng']);
			$totalJarak = $totalJarak + $perbedaanJarak['kilometers'];
            $point1 = $point2;
			}
			$no++;
        }
		
		$estimasiJarak = number_format($totalJarak,3,',','');
		return $estimasiJarak;
	}

	function totalKunjunganBulanIni($id = null)
	{
		$this->ci->load->model("kunjungan_m");
		// Total Jarak
		$data = $this->ci->kunjungan_m->getByMonth(date("Y"), date("m"), $id);        
		return $data->num_rows();
	}

	function modusKunjungan($id,$tahun,$bulan)
	{
		$this->ci->load->model("kunjungan_m");
		// Data Rekam Trayek Harian (Untuk Keperluan Maps Titik per Lokasi)
		$dataMonth = $this->ci->kunjungan_m->getByMonth($tahun, $bulan, $id);
		if ($dataMonth != null) {
			$datamarker = "";
			foreach ($dataMonth->result() as $key => $x) {
				$datamarker = $datamarker . substr($x->lat,0,6).",".substr($x->lng,0,7).":";
			}
		}
		
		$data = explode(":",$datamarker);
		// return $datamarker;

		if(is_array($data)){ 
 
            $arrFrequency = [];
            foreach( $data as $v ) {
                if (!isset($arrFrequency[$v])) {
                    $arrFrequency[$v] = 0;
                }
                $arrFrequency[$v]++;
            }
 
            if( count($data) == count($arrFrequency) ){
                return []; 
            }
 
            $arrMode = array_keys($arrFrequency, max($arrFrequency));
 
            return $arrMode; 
        }   
	}

	function visitTimes($user_id,$lat,$lng,$tahun = null, $bulan = null)
	{
		$this->ci->db->from('tb_kunjungan');
		$this->ci->db->where("user_id",$user_id);
		$this->ci->db->like("lat",substr($lat,0,6));
		$this->ci->db->like("lng",substr($lng,0,7));
        $this->ci->db->order_by('created', "desc");
        if ($tahun != null and $bulan != null) { $this->ci->db->like('created', $tahun . "-" . $bulan); }
        $query = $this->ci->db->get();
        return $query;
	}
	
}
