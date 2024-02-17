<!-- App Capsule -->
<div id="appCapsule">
    <div class="wide-block pt-2 pb-3">
        <div class="form-group">
            <div class="input-group mb-3">              
                <div class="card">
                    <div class="card-body">                    
                        <label class="label">Mulai tanggal : <span id="alert-resume" class="error">*</span></label>
                        <input type="date" class="form-control" name="awal" required>
                        <hr>
                        <label class="label">Hingga tanggal : <span id="alert-resume" class="error">*</span></label>
                        <input type="date" class="form-control" name="akhir" required>
                    </div>
                    
                </div>                
            </div>
            <div class="input-wrapper">
                <label class="label">Jenis<span id="alert-resume" class="error">*</span></label>
                <div class="btn-group btn-group-toggle" data-toggle="buttons" readonly>
                    <label class="btn btn-outline-primary">
                        <input type="radio" name="jenis" id="option2" value="Izin" readonly> Izin
                    </label>
                    <label class="btn btn-outline-primary">
                        <input type="radio" name="jenis" id="option3" value="Cuti" readonly> Cuti
                    </label>
                </div>
            </div>
            <hr>
            <div class="input-wrapper">
                <label class="label" for="name3">Alasan Izin / Cuti<span id="alert-resume" class="error">*</span></label>
                <input type="text" id="word" name="alasan" class="form-control" placeholder="Contoh : Sakit/Melahirkan" required minlength="5">
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
        </div>          
    </div>

    <div class="section full mt-2 mb-2">
        <div class="wide-block pb-2 pt-2">
            <form action="<?=site_url('')?>" method="post">
                <div class="custom-file-upload">
                    <input type="file" name="bukti" id="targetkerja" accept=".pdf">
                    <label for="targetkerja">
                        <span>
                            <strong>
                                <ion-icon name="cloud-upload-outline"></ion-icon>
                                <i>Klik Untuk Upload Surat Izin/Surat Cuti</i>
                            </strong>
                        </span>
                    </label>
                </div>                        
                <div class="form-button">
                    <button type="submit" class="btn btn-block btn-info"><ion-icon name="cloud-upload-outline"></ion-icon> UPLOAD</button>
                </div>
            </form>
        </div>
    </div>	       
		
</div>
<!-- * App Capsule -->