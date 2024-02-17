    
<div id="appCapsule">
    <div class="row">
		<div class="col-12">
			<div class="col-12">	
                <h3>DATA KUNJUNGAN</h3>

                    <div class="card">
                        <div class="card-body">        

                        <!-- Table -->
                        <div class="table-responsive-sm">
                            <table id='empTable' class='table table-bordered'>

                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Resume</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>                    
                                </tr>
                            </thead>

                            </table>
                        </div>
                        </div>
                    </div>    
                </div>        
            </div>                
        </div>
    </div>
</div>

	<!-- Script -->
	<script type="text/javascript">
	$(document).ready(function(){
	   	$('#empTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
            'ordering': true,
            'order': [[1, 'asc']],
	      	'ajax': {
	          'url':'<?=base_url()?>/Data/kunjunganList'
	      	},
	      	'columns': [
                {
                    "data": null,
                    "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
	         	{ data: 'resume' },
	         	{ data: 'created'},
                { data: 'id',
                    "render": function(data, type, row, meta) { // Tampilkan kolom aksi
                    var html = "<a href='kunjungan/updatekunjungan' class='btn btn-danger'><i class='fa fa-edit'></i></a>"
                    return html
                    }
                },
                	         	
	      	]
	   	});
	});
	</script>

	