<!-- App Capsule -->
<div id="appCapsule">

<div class="section full mt-2">
    
    
    <div class="row">
		<div class="col-12">
			<div class="col-12">	
            <h3>LAPORAN TENAGA PENDAMPING</h3>
            <div class="card">
				<div class="card-body">
				
				<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?= $this->session->id ?>">
					<div class="input-group mb-3">	

                        <select name="tahun" class="btn btn-outline-primary " required>
							<option value="">Pilih Tahun</option>
							<?php $thn_skr = date('Y');
							for ($x = $thn_skr; $x >= 2022; $x--) { ?>
								<option value="<?php echo $x ?>"><?php echo $x ?></option>
							<?php } ?>
						</select>			

						<select name="kabkota" class="btn btn-outline-primary " required>
							<option value="">Pilih Kabupaten / Kota</option>
                            <?php
                            $this->db->order_by('id','ASC');
                            foreach ($this->fungsi->pilihan("tb_lembaga")->result() as $key => $pilihan) {;
                            ?>
                            <option value="<?= $pilihan->kota?>"><?= $pilihan->kota?></option>
                            <?php }?>
						</select>   
                        
                        

                        
						<button type="submit" class="btn btn-success">Filter <i class="fa fa-eye"></i></button>
                        
					</div>
				</form>
                </div>
            </div>
                            <hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                        <div style="overflow-x:auto;">
							<table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
                            <thead>
									<tr>
										<th width="5%">No</th>
										<th width="20%">Nama Tenaga Pendamping</th>
                                        <th width="20%">Aksi</th>

									</tr>
								</thead>
								<tbody>
                                    <tr>
                                        <td scope="row">
                                            <p>1</p>
                                        </td>
                                        <td scope="row">
                                            <p>Dian Hafida</p>                                        
                                        </td>                        
                                        <td>
                                            <a href="<?=site_url('tampilan/koordinatorlaporan')?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>									
								</tbody>
							</table>
                            </div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

</div>



</div>
<!-- * App Capsule -->