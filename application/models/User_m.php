<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/
class User_m extends CI_Model
{

	//Kode akses
	function get($id = null)
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	/*
		Modul untuk menyingkat pengambilan data berdasarkan kolom dan variabel kolom tertentu.

		Misal, ingin mendapatkan nomor HP maka penulisannya
		$this->user_m->getAllBy("hp","no_hp");
		$this->user_m->getAllBy("wilayah_kerja","id_lembaga");

		$this->user_m->getAllBy("nama kolom","isi variabel kolom");
	*/
	function getAllBy($kolom = null, $var = null, $koordinator = null)
	{
		$this->db->from('tb_user');
		if ($kolom != null && $var != null) { $this->db->where($kolom, $var); }
		if ($koordinator != null) { $this->db->where("wilayah_kerja", $koordinator);$this->db->where("tipe_user", "1"); }
		$this->db->where("status","1");
		$query = $this->db->get();
		return $query;
	}

	function getAttrBy($kolom = null, $var = null, $user_id = null)
	{
		$this->db->from('tb_user');
		if ($kolom != null && $var != null) { $this->db->where($kolom, $var); }
		if ($user_id != null) { $this->db->where("id", $user_id);$this->db->where("tipe_user", "1"); }
		$this->db->where("status","1");
		$query = $this->db->get();
		return $query;
	}

	/*
		Fungsi menambahkan data pengguna
		1. TP harus mengisi lengkap dan terbuka untuk umum
		2. Koordinator mengisi untuk keperluan akun saja, selanjutnya bisa dilengkapi di edit profil
		3. Admin mengisi untuk keperluan akun saja, selanjutnya dilengkapi di menu profil

		Note: Untuk keamanan data, jangan menambahkan input tipe_user pada tampilan. Begitupula untuk update profile.

	*/
	function addTP($post)
	{
		//Input Data
		$params['id'] =  "";
		$params['username'] =  $post['username'];
		$params['password'] =  $post['password'];
		$params['email'] =  $post['email'];
		$params['nama'] =  $post['nama'];
		$params['nik'] =  $post['nik'];
		$params['tempat_lahir'] =  $post['tempat_lahir'];
		$params['tgl_lahir'] =  $post['tgl_lahir'];
		$params['wilayah_kerja'] =  $post['wilayah_kerja'];
		$params['kelamin'] =  $post['kelamin'];
		$params['hp'] =  $post['hp'];
		$params['agama'] =  $post['agama'];
		$params['domisili'] =  $post['domisili'];
		$params['pernikahan'] =  $post['pernikahan'];
		$params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];
		$params['tahun_bergabung'] =  $post['tahun_bergabung'];
		$params['created'] =  date("Ymdhmsi");
		$this->db->insert('tb_user', $params);
	}

	function addKoordinator($post)
	{
		//Input Data
		$params['id'] =  "";
		$params['username'] =  $post['username'];
		$params['password'] =  $post['password'];
		$params['email'] =  $post['email'];
		$params['nama'] =  $post['nama'];
		$params['nik'] =  $post['nik'];
		$params['wilayah_kerja'] =  $post['wilayah_kerja'];
		$params['tipe_user'] =  '2';
		$params['created'] =  date("Ymdhmsi");
		$this->db->insert('tb_user', $params);
	}

	function addAdmin($post)
	{
		//Input Data
		$params['id'] =  "";
		$params['username'] =  $post['username'];
		$params['password'] =  $post['password'];
		$params['email'] =  $post['email'];
		$params['nama'] =  $post['nama'];
		$params['nik'] =  $post['nik'];
		$params['tipe_user'] =  '3';
		$params['created'] =  date("Ymdhmsi");
		$this->db->insert('tb_user', $params);
	}

	/*
		Menu update profil untuk seluruh user
	*/
	function updateProfil($post)
	{
		//Id	  
		$params['id'] =  $this->session->id;
		// Kebutuhan User
		$params['nama'] =  $post['nama'];
		$params['nik'] =  $post['nik'];
		$params['tempat_lahir'] =  $post['tempat_lahir'];
		$params['tgl_lahir'] =  $post['tgl_lahir'];
		$params['kelamin'] =  $post['kelamin'];
		$params['agama'] =  $post['agama'];
		$params['domisili'] =  $post['domisili'];
		$params['pernikahan'] =  $post['pernikahan'];
		$params['tahun_bergabung'] =  $post['tahun_bergabung'];
		$params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];
		if ($post['email'] != null) { $params['email'] =  $post['email']; }
		if ($post['hp'] != null) { $params['hp'] =  $post['hp']; }
		if ($post['foto'] != null) { $params['foto'] =  $post['foto']; } else { $params['foto'] =  ""; }

		$this->db->where('id', $params['id']);
		$this->db->update('tb_user', $params);
	}

	/* 
		Aktivasi akun dengan menghit user_id
	*/
	function accUser($user_id)
	{
		$params['id'] =  $user_id;
		$params['status'] =  "1";

		$this->db->where('id', $params['id']);
		$this->db->update('tb_user', $params);
	}

	function deactiveUser($user_id)
	{
		$params['id'] =  $user_id;
		$params['status'] =  "2";

		$this->db->where('id', $params['id']);
		$this->db->update('tb_user', $params);
	}

	function setPassword($post)
	{
		$params['id'] =  $this->session->id;
		$params['password'] =  sha1($post['password']);

		$this->db->where('id', $params['id']);
		$this->db->update('tb_user', $params);
	}

	function setBidang($post)
	{
		$params['id'] =  $this->session->id;
		$params['bidang'] =  $post['bidang'];

		$this->db->where('id', $params['id']);
		$this->db->update('tb_user', $params);
	}

	function getPoin($user_id)
	{
		$this->ci->db->select_sum('poin');		
		$this->ci->db->where("user_id",$user_id);		
		$query = $this->ci->db->get('tb_leaderboard')->row('poin');
		return $query;
	}


}
