<!-- App Capsule -->
<div id="appCapsule">
<div class="section full mt-2 mb-2">
  <?php $this->view('message') ?>
</div>
  
<div class="section full mt-2 mb-2">
    <div class="wide-block pt-2 pb-3">
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Judul</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="judul" placeholder="Ex: Petunjuk Penggunaan" value="<?= set_value('judul');?>" required>
              </div>                            
              <?php echo form_error('judul')?>                        
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="3" name="deskripsi" id="summernote" required style="width: 100%"><?php echo form_error('deskripsi')?></textarea>                
              </div>                                                                  
            </div>                        
            <div class="form-group">
              <label>Foto</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
              <small>Maksimal ukuran file 514 Kb</small>                     
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group mb-3">
                <input type="date" class="form-control" name="created" value="<?= set_value('created');?>" required>
              </div>                            
              <?php echo form_error('created')?>                        
            </div>            
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button id="btn-submit" type="submit" class="btn btn-success" onclick="document.getElementById('btn-submit').innerHTML='Proses Upload'">Tambah</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
    </div>
</div>

</div>
<!-- * App Capsule -->
