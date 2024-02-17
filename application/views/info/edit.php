<!-- App Capsule -->
<div id="appCapsule">
  <div class="section full mt-2 mb-2">
    <div class="wide-block pt-2 pb-3">
        <?php $this->view('message') ?>
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Judul</label>
              <div class="input-group mb-3">
                <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
                <input type="text" class="form-control" name="judul" placeholder="Ex: Pendataan Keanggotaan Alumni" value="<?= $this->input->post('judul') ?? $row->judul ?>" required>
              </div>                            
              <?php echo form_error('judul')?>                        
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="3" name="deskripsi" required="" id="summernote" style="width: 100%"><?= $this->input->post('deskripsi') ?? $row->deskripsi ?></textarea>                
              </div>                                                                  
            </div>            
            <?php if($row->foto != null) {?>
            <div>
              <img src="<?=base_url('assets/dist/img/foto-info/'.$row->foto)?>" style="width: 80%"><br>
              <input type="hidden" name="foto" value="<?= $this->input->post('foto') ?? $row->foto; ?>">
              <a href="<?= site_url('info/hapusfoto/'.$row->id);?>"><small>Hapus foto?</small></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>Foto</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
              <small>Maksimal ukuran file 514 Kb</small>
              <br>                     
            </div>            
            <?php } ?>
            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group mb-3">
                <input type="date" class="form-control" name="created" value="<?= $this->input->post('created') ?? date('Y-m-d', strtotime($row->created)); ?>" required>
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
            <button id="btn-submit" type="submit" class="btn btn-success" onclick="document.getElementById('btn-submit').innerHTML='Proses Upload'">Edit</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
    </div>
</div>

</div>
<!-- * App Capsule -->