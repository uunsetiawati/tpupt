<!DOCTYPE html>
<html>

<body>
    Ini contoh buat implementasi value latitude dan longtitude serta loc image yang dibutuhkan di database kunjungan.
    Ketika disumbit bisa menggunakan model Kunjungan_m->saveKunjungan($post)
    <form action="<?=base_url("test/addKunjungan")?>" method="post">
    <input type="text" value="1" name="user_id"><br>
    tipe<input type="text" value="koperasi" name="tipe"><br>
    resume<input type="text" value="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum." name="resume"><br>
    <input type="text" value="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum." name="detail"><br>
    <input type="text" value="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum." name="identifikasi"><br>
    <input type="text" value="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum." name="kegiatan"><br>
    <input type="text" value="" name="foto_selfie"><br>
    <input type="text" value="" name="foto_lokasi"><br>
    <input type="hidden" value="<?= $lat?>" name="lat">// Ini nanti di hidden<br>
    <input type="hidden" value="<?= $lng?>" name="lng">// Ini nanti di hidden<br>
    <input type="hidden" value="<?= $loc_img?>" name="loc_img">// Ini nanti di hidden<br>
    <button>Submit</button>
    </form>
</body>
</html>