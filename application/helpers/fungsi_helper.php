<?php

// Cek Sudah Login
function check_already_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('username');
	if ($user_session) {
		redirect('dashboard');
	}
}

// Cek Harus Login
function check_not_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('username');
	if (!$user_session) {
		redirect('auth/login');
	}
}

/*
	AKSES MINIMAL
	Fungsi untuk memfavalidasi hak Akses yang dibutuhkan pada masing-masing fitur
	Kode akses :
		1. tp (minimal akses TP)
		2. koordinator (minimal akses Koordinator)
		3. admin (minimal akses Admin)

	penulisan :
	akses("level")
	Ex: akses("tp")
*/
function akses($level)
{
	$ci =& get_instance();
	// Level Akses
	if ($level == "tp") { $level = "1";} else if ($level == "koordinator") { $level = "2";} else if ($level == "admin") { $level = "3";} else { $level = "1"; }
	// Kondisi Sesuai Level
	if ($ci->session->userdata('tipe_user') < $level) {
		redirect('auth/login');
	}
}

function previllage($previllage,$tipe_user,$aksi,$redirect)
{
	$ci =& get_instance();
	if ($aksi == "<") { 
		if ($tipe_user < $previllage) {
			redirect($redirect);
		}
	} else if ($aksi == ">") {
		if ($tipe_user > $previllage) {
			redirect($redirect);
		}
	} else if ($aksi == "=") {
		if ($tipe_user == $previllage) {
			redirect($redirect);
		}
	} else if ($aksi == "!=") {
		if ($tipe_user != $previllage) {
			redirect($redirect);
		} 
	}
	
}

function isMe($id, $user_id)
{
	$ci = &get_instance();
	if ($id != $user_id) {
		$ci->session->set_flashdata('warning', 'Hanya Bisa mengedit miliknya sendiri');
		redirect('dashboard');
	}
}

/*
	Memberi batasan waktu untuk melakukan pengisian
	Penulisan dengan cukup dengan tanggal mulai dan tanggal akhir dengan format Ymd

	Ex : timevalidation("20221220","20221225")
	Artinya, dimulai tanggal 20 Desember dan berakhir tanggal 25 Desember
*/
function timevalidation($start,$end,$redirect)
{
	$ci =& get_instance();
	if (date("Ymd") > date("Ymd",strtotime($start)) && date("Ymd") < date("Ymd",strtotime($end)))
	{
		
	} else {
		$ci->session->set_flashdata('danger', 'Waktu Belum Dimulai atau Sudah Melewati Batas');
		redirect($redirect);
	}
}

/*
Buat cetak isi variable
*/
function test($x)
{
	var_dump($x);
	die();
}