<!-- App Capsule -->
<div id="appCapsule">

<div class="login-form">
    <div class="section">
        <h1>IZINKAN LOKASI</h1>
        <h4>Klik Untuk menentukan titik lokasi kamu saat ini</h4>
    </div>
    <div class="section mt-2 mb-5">
                            

        <div class="mt-1">
            <button onclick="getLocation()" id="btn-getlocation" class="btn btn-primary btn-block btn-lg">TENTUKAN LOKASI</button>
            <button class="btn btn-primary btn-block btn-lg" id="btn-ulangi" onclick="window.location.reload()" style="visibility: hidden;">ulangi</button>
            <p id="lokasi"></p>
        </div>
        
        <form action="<?= base_url("kunjungan/kunjungan")?>" method="post">  
            <input type="hidden" id="lat-input" name="lat-input" readonly>
            <input type="hidden" id="lng-input" name="lng-input" readonly>
            <button id="btn-kirim" class="btn btn-success btn-block btn-lg" style="visibility: hidden;">Selanjutnya</button>
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
      //Input Nilai Maps
      document.getElementById("lat-input").value = position.coords.latitude;
      document.getElementById("lng-input").value = position.coords.longitude;
      document.getElementById("btn-kirim").style.visibility = 'visible';
      document.getElementById("btn-ulangi").style.visibility = 'visible';
      document.getElementById("btn-getlocation").style.visibility = 'hidden';

    }
  </script>


</div>
<!-- * App Capsule -->