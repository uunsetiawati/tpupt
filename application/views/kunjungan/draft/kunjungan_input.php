<!-- App Capsule -->
<div id="appCapsule">

<div class="section mt-2">
    <div class="section">
        <h1 class="mb-0"><?= date('d / M / y')?></h1>
        <h4 class="mb-0">Input Kunjungan Hari Ini </h4>
    </div>
    <hr>
    <div class="section mt-2 mb-5" >
        <div class="form-group boxed">
            <div class="input-wrapper">
                <label class="label" for="name3">Kunjungan <span class="error">*</span></label>
                    
                    <select name="tipe" class="form-control" onchange="ukmkoperasi()" id="pilihtipe">
                    <option value="">--PILIH KUNJUNGAN--</option>
                    <option value="UKM" >UKM</option>
                    <option value="KOPERASI" >KOPERASI</option>
                    <option value="CALON WIRAUSAHA" >CALON WIRAUSAHA</option>
                    <option value="LAINNYA" >LAINNYA</option>
                    </select>
            </div>
        </div>       
        <hr>    

            
        <form action="<?=site_url("")?>/kunjungan/saveCheckIn" enctype="multipart/form-data" method="post" id="ukm" style="display:none;">  
            <input type="hidden" name="tipe" id="tampiltipe">
                        
            <div class="form-group boxed" >
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Nama <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="nama" class="form-control" placeholder="Nama Pelaku Usaha/Koperasi yang dikunjungi" required minlength="3">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>                   
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" required>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="jk" id="option2" value="Laki-Laki"> Laki-Laki
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="jk" id="option3" value="Perempuan"> Perempuan
                        </label>
                    </div>
                </div>
                <hr> 
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">No. Telepon (WhatsApp) <span id="alert-resume" class="error">*</span></label>
                    <input type="number" id="word" name="hp" class="form-control" placeholder="No. Telp/WhatsApp Pelaku Usaha/Koperasi yang dikunjungi" required minlength="8">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
                <hr>
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Tujuan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tujuan" class="form-control" placeholder="Tujuan Kunjungan" required minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
            </div>       
                 
            <hr>

            <!-- <input type="hidden" value="<?= $lat?>" name="lat">
            <input type="hidden" value="<?= $lng?>" name="lng">
            <input type="hidden" value="<?= $loc_img?>" name="loc_img"> -->

            <div class="form-button" id="btnsubmit" style="display:block;">
                <button type="submit" onclick="return checkWordCount()" class="btn btn-success btn-block btn-lg">KIRIM</button>
            </div>
        </form>      

           
        <form action="<?=site_url("")?>/kunjungan/saveCheckIn" enctype="multipart/form-data" method="post" id="lainnya" style="display:none;">    
        <input type="hidden" name="tipe" value="LAINNYA">                       
                 
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
                    <input type="text" id="word" name="tindaklanjut" class="form-control" placeholder="Tindak dari Kegiatan" required required minlength="10">
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

            <!-- <input type="hidden" value="<?= $lat?>" name="lat">
            <input type="hidden" value="<?= $lng?>" name="lng">
            <input type="hidden" value="<?= $loc_img?>" name="loc_img"> -->

            <div class="form-button" id="btnsubmit" style="display:block;">
                <button type="submit" onclick="return checkWordCount()" class="btn btn-success btn-block btn-lg">KIRIM</button>
            </div>
        </form>        
    </div> 

    <a href="#" class="button goTop">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </a>

</div>
<!-- * App Capsule -->



<script type="text/javascript">

function ukmkoperasi()
    {
        var x = document.getElementById("pilihtipe").value;

        if(x==""){
            document.getElementById("ukm").style.display = 'none';
            // document.getElementById("btnsubmit").style.display = 'none';
            document.getElementById("lainnya").style.display = 'none';
            
        }else if(x=="UKM" || x=="KOPERASI" || x=="CALON WIRAUSAHA"){
            document.getElementById("ukm").style.display = 'block';
            // document.getElementById("btnsubmit").style.display = 'block';
            document.getElementById("lainnya").style.display = 'none';
            document.getElementById("tampiltipe").value = x;
        }else{            
            document.getElementById("lainnya").style.display = 'block';
            // document.getElementById("btnsubmit").style.display = 'block';
            document.getElementById("ukm").style.display = 'none';
        }
        
    }


</script>