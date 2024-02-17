<?php

class Maps
{

        protected $ci;


        function __construct()
        {
                $this->ci = &get_instance();

                //Setting penyimpanan
                $this->key = "AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A";
                $this->storage = 'assets/files/maps/';
                $this->storagetmp = 'assets/files/maps/tmp/';
        }

        // Digunakan untuk menyimpan gambar maps sesuai lokasi
        function saveMapsTmp($lat, $lng)
        {
                $url = "https://maps.googleapis.com/maps/api/staticmap?markers=color:red%7Clabel:LOKASI%7C" . $lat . "," . $lng . "&zoom=15&size=500x500&maptype=roadmap&key=" . $this->key;
                // test($url);
                $img = FCPATH . $this->storagetmp . date("Ymdhmsi") . $this->ci->session->hp. ".jpg";
                $fix = $this->storagetmp . date("Ymdhmsi") . $this->ci->session->hp. ".jpg";
                // test($img);
                file_put_contents($img, file_get_contents($url));
                return $fix;
        }

        function saveMapsImg($url,$hp)
        {
                $img = FCPATH . $this->storage . date("Ymdhi") . "-FIX-".$hp.".jpg";
                $name = date("Ymdhi") . "-FIX-".$hp.".jpg";
                file_put_contents($img, file_get_contents($url));
                return $name;       
        }

        function deleteMapsImg($file)
        {
                $url = FCPATH . $this->storage . $file;
                unlink($url);
        }

        function monthMaps($center,$data)
        {
                //https://maps.googleapis.com/maps/api/staticmap?center=-7.8081176%2C112.0413752&zoom=11&scale=2&size=600x300&maptype=roadmap&format=jpg&key=AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A&markers=size:mid%7Ccolor:0xff0000%7Clabel:0%7C-7.8081176%2C112.0413752|&markers=size:mid%7Ccolor:0xff0000%7Clabel:1%7C-7.980053627303948%2C%20112.67220217137805;
                $url = "https://maps.googleapis.com/maps/api/staticmap?center=". $center ."&zoom=11&scale=2&size=600x300&maptype=roadmap&format=jpg&" . $data . "&key=" . $this->key;
                // test($url);
                $img = FCPATH . $this->storagetmp . date("Ymdhmsi") . $this->ci->session->hp. ".jpg";
                $fix = $this->storagetmp . date("Ymdhmsi") . $this->ci->session->hp. ".jpg";
                // test($img);
                file_put_contents($img, file_get_contents($url));
                return $fix;
        }

        
}
