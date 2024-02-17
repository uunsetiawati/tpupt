<table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="15%">Maps</th>
            <th width="10%">Tanggal</th>
            <th width="60%">Tujuan</th>
            <th width="15%">Foto Selfie</th>
            <th width="15%">Foto Lokasi</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($row->result() as $key => $data) {;
        ?>
            <tr>
                <td scope="row">
                    <p><?= $no++ ?></p>
                </td>
                <td>
                    <a href="https://maps.google.com/maps?q=<?= $data->lat ?>,<?= $data->lng ?>" target="blank"><img src="https://tp.uptkukm.id/assets/files/maps/<?= $data->loc_img ?>" alt="" class="imaged w200">
                </td>
                <td><?= date("d-m-Y G:i:s", strtotime($data->created)) ?></td>
                <td>
                    <strong>Kunjungan ke <?= $data->tipe ?></strong>. Bertujuan untuk
                    <?= $data->tujuan ?>
                </td>
                <td>
                    <img src="https://tp.uptkukm.id/assets/files/foto_selfie/<?= $data->foto_selfie ?>" alt="" class="imaged w200">
                </td>
                <td>
                    <img src="https://tp.uptkukm.id/assets/files/foto_lokasi/<?= $data->foto_lokasi ?>" alt="" class="imaged w200">
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<form name="doc_test" action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post">
		<input type="submit" name="submit_doc" value="Ekspor ke MS WORD">
	</form>
    
<?php
		if(isset($_POST['submit_doc'])) {
			header("Content-Type: application/vnd.msword");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("content-disposition: attachment;filename=hasilekspor.doc");
		}
	?>  