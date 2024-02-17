<!-- App Capsule -->
<div id="appCapsule">
    <div class="section mt-2">
        <div class="section">
            <h1 class="mb-0">Kunjungan Tenaga Pendamping : <?= $row->created ?></h1>
        </div>
        <hr>
        <div class="section mt-2 mb-5">
            <input type="hidden" name="tipe" value="<?= $row->tipe ?>">
            <input type="hidden" name="id" value=<?= $row->id ?>>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <label class="label">Nama Pelaku UMKM / Pengurus Koperasi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Pelaku Usaha/Koperasi yang dikunjungi" readonly minlength="3" value="<?= $row->nama ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" readonly>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="kelamin" id="option2" value="Laki-Laki" <?= $row->kelamin == "Laki-Laki" ? "checked" : "" ?>> Laki-Laki
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="kelamin" id="option3" value="Perempuan" <?= $row->kelamin == "Perempuan" ? "checked" : "" ?>> Perempuan
                        </label>
                    </div>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Agama <span id="alert-resume" class="error">*</span></label>
                    <select name="agama" class="form-control">
                        <option value="<?= $row->agama ?>">Agama : <?= $row->agama ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Kong Hu Cu">Kong Hu Cu</option>
                    </select>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">NIK <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="nik" class="form-control" placeholder="No. KTP Pelaku Usaha/Koperasi yang dikunjungi" readonly minlength="16" maxlength="16" value="<?= $row->nik ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tempat Lahir <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" readonly minlength="5" value="<?= $row->tempat_lahir ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tanggal Lahir <span id="alert-resume" class="error">*</span></label>
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Tempat Lahir" readonly minlength="5" value="<?= $row->tgl_lahir ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Pendidikan<span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="text" class="form-control" readonly minlength="10" maxlength="16" value="<?= $row->pendidikan ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">No. Telepon (WhatsApp) <span id="alert-resume" class="error">*</span></label>
                    <input type="number" name="hp" class="form-control" placeholder="No. Telp/WhatsApp Pelaku Usaha/Koperasi yang dikunjungi" readonly minlength="10" maxlength="16" value="<?= $row->hp ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Email <span id="alert-resume" class="error">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Email WhatsApp Pelaku Usaha/Koperasi yang dikunjungi" readonly minlength="5" value="<?= $row->email ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Nama UMKM/KOPERASI <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="brand" class="form-control" placeholder="Nama UMKM/ KOPERASI yang dikunjungi" readonly minlength="10" maxlength="30" value="<?= $row->brand ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Alamat UMKM/KOPERASI <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Pelaku Usaha/Koperasi yang dikunjungi" readonly minlength="10" value="<?= $row->alamat ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Produk yang dihasilkan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="produk" class="form-control" placeholder="Produk yang dihasilkan oleh Pelaku Usaha/Koperasi yang dikunjungi" readonly minlength="5" value="<?= $row->produk ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Kota / Kab.<span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="text" class="form-control" readonly minlength="10" maxlength="16" value="<?= $row->kota ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tahun Pendirian Koperasi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="tahun_berdiri" class="form-control" placeholder="Ex: 2022" readonly maxlength="4" value="<?= $row->tahun_berdiri ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Nomor Induk Koperasi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="nik_koperasi" class="form-control" placeholder="Nomor Induk Koperasi yang dikunjungi" readonly value="<?= $row->nik_koperasi ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Nomor IUMK <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="iumk" class="form-control" placeholder="Nomor IUMK  yang dikunjungi" readonly value="<?= $row->iumk ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Jabatan di Koperasi/UMKM <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan Pelaku Usaha/ Koperasi yang dikunjungi" readonly minlength="5" value="<?= $row->jabatan ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Skala<span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="skala" class="form-control" readonly minlength="10" maxlength="16" value="<?= $row->skala ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Volume Omset Usaha <span id="alert-resume" class="error">*</span></label>
                    <input type="number" name="omset" class="form-control" placeholder="Volume Omset Usaha UMKM/ Koperasi yang dikunjungi" readonly value="<?= $row->omset ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Jumlah Karyawan <span id="alert-resume" class="error">*</span></label>
                    <input type="number" name="jumlah_karyawan" class="form-control" placeholder="Jumlah Karyawan Pelaku Usaha/ Koperasi yang dikunjungi" readonly value="<?= $row->jumlah_karyawan ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Permasalan yang dihadapi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="masalah" class="form-control" placeholder="Permasalahan yang dihadapi" readonly minlength="10" value="<?= $row->masalah ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Kebutuhan Diklat <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="kebutuhan" class="form-control" placeholder="Kebutuhan Diklat" readonly minlength="5" value="<?= $row->kebutuhan ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Rekomendasi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="rekomendasi" class="form-control" placeholder="Rekomendasi" readonly minlength="10" value="<?= $row->rekomendasi ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                    <label class="label">Foto Selfie <span id="alert-resume" class="error">*</span></label>
                    <img src="<?= base_url() ?>/assets/files/foto_selfie/<?= $row->foto_selfie ?>" alt="" class="imaged w240">
                <hr>
                    <label class="label">Foto Lokasi <span id="alert-resume" class="error">*</span></label>
                    <img src="<?= base_url() ?>/assets/files/foto_lokasi/<?= $row->foto_lokasi ?>" alt="" class="imaged w240">
                    <hr>
                    <label class="label">Foto Maps <span id="alert-resume" class="error">*</span></label>
                    <img src="<?= base_url() ?>/assets/files/maps/<?= $row->loc_img ?>" alt="" class="imaged w240"> 
            </div>
            <hr>
            <div class="form-button">
                <button type="button" class="btn btn-primary btn-block btn-lg" onclick="history.back()">KEMBALI</button>
            </div>
        </div>
        <a href="#" class="button goTop">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
    </div>
    <!-- * App Capsule -->