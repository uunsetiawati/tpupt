<!-- App Capsule -->
<div id="appCapsule">


<div class="section full mt-2">
    
    
    <div class="row">
		<div class="col-12">
			<div class="col-12">	
            <h3>CETAK DATA LAPORAN</h3>
            <div class="card">
					<div class="card-body">
				
				<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?= $this->session->id ?>">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>                     
						
                        

						<select name="tahun" class="btn btn-outline-primary " required>
							<option value="">Pilih Tahun</option>
							<?php $thn_skr = date('Y');
							for ($x = $thn_skr; $x >= 2022; $x--) { ?>
								<option value="<?php echo $x ?>"><?php echo $x ?></option>
							<?php } ?>
						</select>
                        

                        
						<button type="submit" class="btn btn-success">Filter <i class="fa fa-eye"></i></button>
                        
					</div>
					<div class="input-group-append">
					</div>
				</form>
                            </div>
                            </div>
                            <br>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                        <div style="overflow-x:auto;">
							<table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
								<thead>
									<tr>
										<th width="40%">Bulan</th>
                                        <th width="40%">Tahun</th>

									</tr>
								</thead>
								<tbody>
								
									<?php
									$bulan = [1 => "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
									for($i=1;$i<=12;$i++){
									?>
                                    <tr>
                                        <td scope="row">
                                            <p><?=$bulan[$i]?></p>                                        
                                        </td>                                       
                                        <td>
                                            <a href="" class="btn btn-danger"><i class="fa fa-download"></i></a>
                                            <a href="" class="btn btn-warning"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>	
									<?php }?>								
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