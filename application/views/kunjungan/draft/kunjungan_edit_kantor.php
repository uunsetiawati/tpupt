<!-- App Capsule -->
<div id="appCapsule">

<div class="section mt-2">
    <div class="section">
    <h1 class="mb-0">Edit Kunjungan</h1>
    </div>
    <hr>
    <div class="section mt-2 mb-5" >   
           
        <form action="<?=site_url("")?>" enctype="multipart/form-data" method="post">                        
                 
            <div class="form-group boxed" >
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Permasalan yang dihadapi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="masalah" class="form-control" placeholder="Permasalahan yang dihadapi" required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Target <span id="alert-resume" class="error">*</span></label>
                    <input type="tel" id="word" name="target" class="form-control" placeholder="Target yang ingin dicapai" required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Realisasi/Output <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="realisasi" class="form-control" placeholder="Realisasi yang dilakuakan" required required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Kegiatan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="kegiatan" class="form-control" placeholder="Kegiatan yang dilakukan" required required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Tujuan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tujuan" class="form-control" placeholder="Tujuan Kegiatan" required required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Kesimpulan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="kesimpulan" class="form-control" placeholder="Kesimpulan dari Kegiatan" required required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Tindak Lanjut <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tindaklanjut" class="form-control" placeholder="Tindak lanjut dari Kegiatan" required required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Keterangan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="keterangan" class="form-control" placeholder="Keterangan bisa diisikan tempat Kegiatan" required required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <label class="label" for="name3">Foto Selfie <span id="alert-resume" class="error">*</span></label>
                <div class="custom-file-upload">                
                    <input type="file" id="foto_selfie" accept=".png, .jpg, .jpeg" required>
                    <label for="foto_selfie">
                        <span>
                            <strong>
                                <ion-icon name="cloud-upload-outline"></ion-icon>
                                <i>Klik Untuk Upload Foto Selfie</i>
                            </strong>
                        </span>
                    </label>
                </div>
                <hr>
                <label class="label" for="name3">Foto Lokasi <span id="alert-resume" class="error">*</span></label>
                <div class="custom-file-upload">                
                    <input type="file" id="foto_lokasi" accept=".png, .jpg, .jpeg" required>
                    <label for="foto_lokasi">
                        <span>
                            <strong>
                                <ion-icon name="cloud-upload-outline"></ion-icon>
                                <i>Klik Untuk Upload Foto Lokasi</i>
                            </strong>
                        </span>
                    </label>
                </div>
            </div>     
            <hr>

            <div class="form-button" id="btnsubmit">
                <button type="submit" class="btn btn-success btn-block btn-lg">KIRIM</button>
            </div>
        </form>        
    </div> 

    <a href="#" class="button goTop">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </a>

</div>
<!-- * App Capsule -->