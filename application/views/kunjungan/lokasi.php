<!-- App Capsule -->
<div id="appCapsule">

<div class="login-form">
    <div class="section">
        <h1>BAGIKAN LOKASI</h1>
        <h4>Klik untuk Membagikan Lokasi Terkini</h4>
      </div>
      <div class="section mt-2 mb-5">
        <?php $this->view('message'); ?>
        <div class="mt-1">
            <button onclick="getLocation()" id="btn-getlocation" class="btn btn-primary btn-block"><ion-icon name="locate-outline"></ion-icon> BAGIKAN LOKASI</button>
            <p id="lokasi"></p>
            <!-- <p id="ket-akurasi" class="text-red">Tingkat Akurasi Google : </p> -->
        </div>
        <form action="<?= base_url("kunjungan/addCheckIn")?>" method="post">  
            <input type="hidden" id="lat" name="lat" readonly>
            <input type="hidden" id="lng" name="lng" readonly>
            <a class="btn btn-outline-warning btn-block" id="btn-ulangi" onclick="window.location.reload()" style="visibility: hidden;"><ion-icon name="repeat-outline"></ion-icon> ULANGI</a>
            <button id="btn-kirim" class="btn btn-success btn-block btn-lg" style="visibility: hidden;"><ion-icon name="paper-plane-outline"></ion-icon> Selanjutnya</button>
            <div id="ket-selanjutnya" class="section-title" style="visibility: hidden;">*Dengan menekan tombol selanjutnya, saya menyatakan bahwa lokasi saya sudah benar. Data akan terekam dan diolah oleh sistem, setiap kecurangan akan mengakibatkan data tidak valid</div>
        </form>
    </div>
</div>

<script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      var elem = document.getElementById("lokasi-img");
      if (elem != null) {
        elem.parentNode.removeChild(elem);
        console.log("Posisi Sudah Akurat");
      }
      //Buat Peta
      var x = document.createElement("IMG");
      x.setAttribute("id", "lokasi-img");
      x.setAttribute("src", "https://maps.googleapis.com/maps/api/staticmap?markers=color:red%7Clabel:LOKASI%7C" + position.coords.latitude + "," + position.coords.longitude + "&zoom=15&size=400x400&maptype=roadmap&key=AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A");
      document.getElementById("lokasi").appendChild(x);
      //Input Nilai Maps1
      document.getElementById("lat").value = position.coords.latitude;
      document.getElementById("lng").value = position.coords.longitude;
      // document.getElementById("ket-akurasi").innerHTML = "Tingkat Akurasi Google : " + position.coords.accuracy;
      document.getElementById("btn-kirim").style.visibility = 'visible';
      document.getElementById("btn-ulangi").style.visibility = 'visible';
      document.getElementById("ket-selanjutnya").style.visibility = 'visible';
      document.getElementById("btn-getlocation").style.visibility = 'hidden';

    }
  </script>


</div>
<!-- * App Capsule -->