<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/
use GuzzleHttp\Client;

class Validation_m extends CI_Model
{
    /*
		Untuk halaman login
		Login Biasa menggunakan login
		Login otp menggunakan kelas
			1. Cek HP (Validasi Nomor HP)
			2. Insert OTP (Memasukkan OTP ke Database)
			3. VelidationOTP (Memastikan OTP Benar)
	*/
	function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email',$post['username']);
		$this->db->where('password',sha1($post['password']));
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query; 
	}

    function cekHp($post)
    {
        $this->db->select('*');
		$this->db->from('tb_user');
		$this->db->like('hp', substr($post['hp'], "3", "15"));
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query;
	}

    function insertOTP($post)
    {
       $params['id'] =  $post['id'];
       $params['otp'] =  $post['otp'];
       
       $this->db->where('id', $params['id']);
       $this->db->update('tb_user', $params);
    }

    function validationOTP($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->like('hp', substr($this->session->hp, "3", "15"));
		$this->db->where('status', '1');
		$this->db->where('otp',$post['otp']);
		$query = $this->db->get();
		return $query;
	}

	/*
		Login with google
		Memeriksa kredensial google dengan email yang telah terdaftar di Database
		Jika kredensial sama, maka lanjut login. Jika Tidak, maka gagal
	*/
	function loginGoogle($email)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email', $email);
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query;
	}

	function saveLog()
	{
		$params['id'] =  "";
		$params['user_id'] = $this->session->id;
		$params['ip_address'] = $this->input->ip_address();
		$params['token'] = $this->agent->agent_string();
		$params['platform'] = $this->agent->platform();
		$params['browser'] = $this->agent->browser();
		$params['referrer'] = $this->agent->referrer();
		$params['created'] =  date("Y-m-d H:i:s");
		$this->db->insert('tb_log', $params);
	}

	function cekDevice($token = null, $platform = null, $browser = null, $mobile = null)
    {	
        $this->db->select('*');
		if ($token != null ) { $this->db->where("token", $token);}
		if ($platform != null ) { $this->db->where("platform", $platform);}
		if ($browser != null ) { $this->db->where("browser", $browser);}
		if ($mobile != null ) { $this->db->where("mobile", $mobile);}
		$this->db->from('tb_device');
		$this->db->where('user_id', $this->session->id);
		$query = $this->db->get();
		return $query;
    
	}

	function saveDevice()
	{
		$params['id'] =  "";
		$params['user_id'] = $this->session->id;
		$params['token'] = $this->agent->agent_string();
		$params['platform'] = $this->agent->platform();
		$params['mobile'] = $this->agent->mobile() == null ? "dekstop" : $this->agent->mobile();
		$params['browser'] = $this->agent->browser();
		$params['created'] =  date("Y-m-d H:i:s");
		$this->db->insert('tb_device', $params);
	}

	/*
		Untuk keperluan cek
	*/
	function getTP($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email',$post['username']);
		$this->db->where('password',sha1($post['password']));
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query; 
	}
	/*
		Get Login
	*/
	function getLogLogin($id = null,$limit = null)
	{
		$this->db->select('*');
		$this->db->from('tb_log');
		if ($id != null) { $this->db->where('user_id',$id); }
		if ($limit != null) { $this->db->limit($limit,'0'); }
		$this->db->order_by("created","DESC");
		$query = $this->db->get();
		return $query; 
	}

	function getLocationByAddress($address)
	{
		$client = new Client();
		$response = $client->request('GET','https://maps.googleapis.com/maps/api/geocode/json',[
			'query' => [
				'key' => 'AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A',
				'address' => $address
			]
		]);
		$result = json_decode($response->getBody()->getContents(),true);
		return $result;
	}

	function hitungJarak($lat1,$lng1,$lat2,$lng2)
	{
		$point1 = array("lat" => $lat1, "long" => $lng1);
        $point2 = array("lat" => $lat2, "long" => $lng2);

        $lat1 = $point1['lat'];
        $lon1 = $point1['long'];
        $lat2 = $point2['lat'];
        $lon2 = $point2['long'];

        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet  = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('miles','feet','yards','kilometers','meters');
	}


}
