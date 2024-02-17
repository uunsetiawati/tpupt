<!-- App Capsule -->
<div id="appCapsule">

<div class="section mt-2">
    <div class="section"> 
    </div>
    <div class="section mt-2 mb-5">
        <form action="<?=base_url("kunjungan/updatekunjungan")?>" enctype="multipart/form-data" method="post">
            
            <div class="form-group boxed">
                <div class="input-wrapper">                                     
                    <label class="text" for="name3">Hasil Resume Kunjungan <span id="alert-resume" class="error">*</span></label>
                    <textarea id="word" name="resume" rows="8" class="form-control" placeholder="Minimal 30 kata" required></textarea>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
            </div>
            

            <div class="form-group boxed">
                <label class="text" for="name3">Upload FOTO SELFIE<span class="error">*</span></label>                   
            </div>
            <input type="file" name="selfie" class="btn btn-primary" required>

            <?php
                if (isset($error)){
                    echo "<div class='form-group boxed'><h4>ERROR UPLOAD FOTO SELFIE: </h4>";
                    echo "<label class='label-error' for='name3'>$error</label>
                          </div>";
                }
            ?> 

            <div class="form-group boxed">                
                <label class="text" for="name3">Upload LOKASI <span class="error">*</span></label>
            </div>
            <input type="file" name="lokasi" class="btn btn-primary" required>

            
            <?php
                if (isset($errir)){
                    echo "<div class='form-group boxed'><h4>ERROR UPLOAD LOKASI: </h4>";
                    echo "<label class='label-error' for='name3'>$errir</label>
                          </div>";
                }
            ?> 

            <div class="form-group boxed">                
                <label class="text" for="name3">Upload SPPD <span class="error">*</span></label>
            </div>
            <input type="file" name="sppd" class="btn btn-primary" required>

            
            <?php
                if (isset($errr)){
                    echo "<div class='form-group boxed'><h4>ERROR UPLOAD SPPD: </h4>";
                    echo "<label class='label-error' for='name3'>$errr</label>
                          </div>";
                }
            ?> 
            </br>
            </br>           

            <div class="form-button">
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
function checkWordCount(){
    s = document.getElementById("word").value;
    s = s.replace(/(^\s*)|(\s*$)/gi,"");
    s = s.replace(/[ ]{2,}/gi," ");
    s = s.replace(/\n /,"\n");
    if (s.split(' ').length < 30) {        
        $('#alert-resume').html('(Resume Kurang dari 30 Kata)');    
        return false;
    }else{        
        $('#alert-resume').html('*');
    }

    t = document.getElementById("word2").value;
    t = t.replace(/(^\s*)|(\s*$)/gi,"");
    t = t.replace(/[ ]{2,}/gi," ");
    t = t.replace(/\n /,"\n");
    if (t.split(' ').length < 30) {
        $('#alert-detail').html('(Detail Kurang dari 30 Kata)');
        return false;
    }else{
        $('#alert-detail').html('*');        
    }

    u = document.getElementById("word3").value;
    u = u.replace(/(^\s*)|(\s*$)/gi,"");
    u = u.replace(/[ ]{2,}/gi," ");
    u = u.replace(/\n /,"\n");
    if (u.split(' ').length < 30) {
        $('#alert-identifikasi').html('(Identifikasi Kurang dari 30 Kata)');
        return false;
    }else{
        $('#alert-identifikasi').html('*');        
    }

    v = document.getElementById("word4").value;
    v = v.replace(/(^\s*)|(\s*$)/gi,"");
    v = v.replace(/[ ]{2,}/gi," ");
    v = v.replace(/\n /,"\n");
    if (v.split(' ').length < 30) {
        $('#alert-kegiatan').html('(Kegiatan Kurang dari 30 Kata)');
        return false;
    }else{
        $('#alert-kegiatan').html('*');
    }
}
</script>