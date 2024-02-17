<!-- App Capsule -->
<div id="appCapsule">
<div class="section mt-2">
    <div class="section">
        <h1 class="mb-0">Kunjungan Tenaga Pendamping Tanggal :</h1>
    </div>
    <hr>
    <div class="section mt-2 mb-5" > 
        <form action="<?=site_url("")?>" enctype="multipart/form-data" method="post" id="ukm">  
            <input type="hidden" name="tipe" id="tampiltipe">
                        
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <label class="label">Nama Pelaku UMKM / Pengurus Koperasi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="nama" class="form-control" placeholder="Nama Pelaku Usaha/Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" readonly>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="kelamin" id="option2" value="Laki-Laki" readonly> Laki-Laki
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="kelamin" id="option3" value="Perempuan" readonly> Perempuan
                        </label>
                    </div>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Agama <span id="alert-resume" class="error">*</span></label>
                    <select name="agama" class="form-control" readonly>
                        <option value="ISLAM" >ISLAM</option>
                        <option value="KRISTEN" >KRISTEN</option>
                        <option value="BUDHA" >BUDHA</option>
                        <option value="KATOLIK" >KATOLIK</option>
                        <option value="KONG HU CHU" >KONG HU CHU</option>
                    </select>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">NIK <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="hp" class="form-control" placeholder="No. KTP Pelaku Usaha/Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tempat Lahir <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tanggal Lahir <span id="alert-resume" class="error">*</span></label>
                    <input type="date" id="word" name="tanggallahir" class="form-control" placeholder="Tempat Lahir" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Pendidikan Terakhir <span id="alert-resume" class="error">*</span></label>
                    <select name="pendidikan" class="form-control" readonly>
                        <option value="SD/MI/Sederajat">SD/MI</option>
                        <option value="SMP" >SMP/MTS</option>
                        <option value="SMA/SMK/MA" >SMA/SMK/MA</option>
                        <option value="D-III" >D-III</option>
                        <option value="D-IV" >D-IV</option>
                        <option value="S-1" >S-1</option>
                        <option value="S-2" >S-2</option>
                    </select>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">No. Telepon (WhatsApp) <span id="alert-resume" class="error">*</span></label>
                    <input type="number" id="word" name="hp" class="form-control" placeholder="No. Telp/WhatsApp Pelaku Usaha/Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Email <span id="alert-resume" class="error">*</span></label>
                    <input type="email" id="word" name="email" class="form-control" placeholder="Email WhatsApp Pelaku Usaha/Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Nama UMKM/KOPERASI <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="hp" class="form-control" placeholder="Nama UMKM/ KOPERASI yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Alamat UMKM/KOPERASI <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="alamat" class="form-control" placeholder="Alamat Pelaku Usaha/Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Produk yang dihasilkan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="produk" class="form-control" placeholder="Produk yang dihasilkan oleh Pelaku Usaha/Koperasi yang dikunjungi" radonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>                
                <hr>
                <div class="input-wrapper">
                    <label class="label">Kabupaten/Kota <span id="alert-resume" class="error">*</span></label>
                    <select name="kabkota" class="form-control" readonly>
                        <option value="">Pilih Kab/Kota : </option>
                        <?php
                        $this->db->order_by('id','ASC');
                        foreach ($this->fungsi->pilihan("tb_lembaga")->result() as $key => $pilihan) {;
                        ?>
                        <option value="<?= $pilihan->kota?>"><?= $pilihan->kota?></option>
                        <?php }?>
                    </select>
                    
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tanggal Pendirian Koperasi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tanggalkoperasi" class="form-control" placeholder="Tanggal Pendirian Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Nomor Induk Koperasi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="nikkoperasi" class="form-control" placeholder="Nomor Induk Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Nomor IUMK <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="iumk" class="form-control" placeholder="Nomor IUMK  yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Jabatan di Koperasi/UMKM <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="jabatan" class="form-control" placeholder="Jabatan Pelaku Usaha/ Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Skala Usaha <span id="alert-resume" class="error">*</span></label>
                    <select name="skalausaha" class="form-control" readonly>
                        <option value="MIKRO">MIKRO (UMKM)</option>
                        <option value="KECIL" >KECIL (UMKM)</option>
                        <option value="MENENGAH" >MENENGAH (UMKM)</option>
                        <option value="KOTA/KAB" >KOTA/KABUPATEN (KOPERASI)</option>
                        <option value="PROVINSI" >PROVINSI (KOPERASI)</option>
                        <option value="NASIONAL" >NASIONAL (KOPERASI)</option>

                    </select>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Volume Omset Usaha <span id="alert-resume" class="error">*</span></label>
                    <input type="number" id="word" name="volume" class="form-control" placeholder="Volume Omset Usaha UMKM/ Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Jumlah Karyawan <span id="alert-resume" class="error">*</span></label>
                    <input type="number" id="word" name="jumlahkaryawan" class="form-control" placeholder="Jumlah Karyawan Pelaku Usaha/ Koperasi yang dikunjungi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label" for="name3">Permasalan yang dihadapi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="masalah" class="form-control" placeholder="Permasalahan yang dihadapi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label" for="name3">Kebutuhan Diklat <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="diklat" class="form-control" placeholder="Kebutuhan Diklat" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label" for="name3">Rekomendasi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="rekomendasi" class="form-control" placeholder="Rekomendasi" readonly>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <label class="label" for="name3">Foto Selfie <span id="alert-resume" class="error">*</span></label>
                <div class="custom-file-upload">                
                    FOTO SELFIE
                </div>
                <hr>
                <label class="label" for="name3">Foto Lokasi <span id="alert-resume" class="error">*</span></label>
                <div class="custom-file-upload">                
                    FOTO LOKASI
                </div>
            </div>       
                 
            <hr>            

            <div class="form-button">
                <button type="button" class="btn btn-primary btn-block btn-lg" onclick="history.back()">KEMBALI</button>
            </div>
        </form>      

           
                
    </div> 

    <a href="#" class="button goTop">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </a>

</div>
<!-- * App Capsule -->

