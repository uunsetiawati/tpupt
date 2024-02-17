<!-- App Capsule -->
<div id="appCapsule">

<div class="section mt-2">
    <div class="section">
        <h3> Edit Target Kinerja</h>
    </div>
    <div class="section mt-2 mb-5">
        <form action="<?=site_url('dashboard')?>" enctype="multipart/form-data" method="post">
            
            <input type="text" name="tahun" class="btn btn-outline-primary" placeholder="Tahun" readonly/>
            
            <div class="form-group boxed">
                <div class="input-wrapper">                                     
                    <label class="label" for="name3">Inputkan Target Kerja selama setahun <span id="alert-resume" class="error">*</span></label>
                    <textarea id="word" name="resume" rows="6" class="form-control" placeholder="Minimal 50 Kata" required></textarea>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>                    
                </div>
            </div>
            

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
        $('#alert-resume').html('(Resume Kurang dari 50 Kata)');    
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