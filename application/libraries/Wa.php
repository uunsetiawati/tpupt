<?php

class WA
{

	protected $ci;

	function __construct()
	{
		$this->ci = &get_instance();
	}

	function send($hp = null, $pesan = null)
	{
		// Nanti dirapikan lagi, telat kantor gara2 ini.
		// kadang ada penulisan no hp 0811 239 345
		$hp = str_replace(" ","",$hp);
		// kadang ada penulisan no hp (0274) 778787
		$hp = str_replace("(","",$hp);
		// kadang ada penulisan no hp (0274) 778787
		$hp = str_replace(")","",$hp);
		// kadang ada penulisan no hp 0811.239.345
		$hp = str_replace(".","",$hp);
		
		// cek apakah no hp mengandung karakter + dan 0-9
		if(!preg_match('/[^+0-9]/',trim($hp))){
			// cek apakah no hp karakter 1-3 adalah +62
			if(substr(trim($hp), 0, 3)=='+62'){
				$hp = trim($hp);
			}
			// cek apakah no hp karakter 1 adalah 0
			elseif(substr(trim($hp), 0, 1)=='0'){
				$hp = '0'.substr(trim($hp), 1);
			}
			elseif(substr(trim($hp), 0, 1)!='0' and substr(trim($hp), 0, 2)!='62'){
				$hp = '0'.trim($hp);
			}
			elseif(substr(trim($hp), 0, 2)!='62'){
				$hp = '0'.substr(trim($hp), 2);
			}
		}

		//API dari Whacenter
		// $device_id = 'f75a80b9d2b38921c6134f029d3e8c71'; // Token dari Whacenter fitrah
		// $device_id = 'ab5dbcd15fb0582589596ec252892fc0'; // Token dari Whacenter
		$device_id = '486d5ea1ebb91a8989054bcca41ddeff'; // Token dari Whacenter
		$no_hp = $hp; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $pesan; // Pesan yang dikirim

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://app.whacenter.com/api/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('device_id' => $device_id, 'number' => $no_hp, 'message' => $pesan),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;

		$data = json_decode($response);
		return $data;
	}
}
