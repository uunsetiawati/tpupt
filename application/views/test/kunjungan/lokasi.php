<!DOCTYPE html>
<html>

<body>

  <p>Klik Untuk menentukan titik lokasi yang kamu inginkan</p>
  <button onclick="getLocation()" id="btn-getlocation">Tentukan Lokasi</button>
  <a id="btn-ulangi" onclick="window.location.reload()" style="visibility: hidden;">ulangi</a>
  <p id="lokasi"></p>
  <form action="<?= base_url("test/kunjungan")?>" method="post">
  <input type="hidden" id="lat-input" name="lat-input" readonly>
  <input type="hidden" id="lng-input" name="lng-input" readonly>
  <button id="btn-kirim" style="visibility: hidden;">Selanjutnya</button>
  </form>
  
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
</body>
</html>