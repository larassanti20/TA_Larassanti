<!DOCTYPE html>
<script>
document.addEventListener('DOMContentLoaded', function () {
let table = new DataTable('#dt-data_suhu', {
pageLength : 5,
 lengthMenu: [[5, 10, 20, 25], [5, 10, 20, 25]],
 order: [[0, 'desc']],
 ajax: function (d, cb) {
 fetch('api/suhu.php')
 .then(response => response.json())
 .then(data => cb(data));
 },
 columns: [
 { data: 'time_update' },
 { data: 'nilai_suhu' },
{ data: 'kondisi_mesin' }
 ],
 "columnDefs": [
 {"targets": "_all",
 "className": "dt-center"
 },
 {"targets" : [ 3 ],
 render : function (data, type, row) {

 if(row.nilai_suhu > 79 && nilai_suhu < 91){
	return '<button class="btn btn-success btnblock"><strong><i class="fa fa-check"></i> 
	Normal</strong></button>';
 
 } else if(row.nilai_suhu >= 91 && nilai_suhu < 96 ){
	return '<button class="btn btn-warning btnblock"><strong><i class="fa fa-check"></i> 
	Waspada</strong></button>';
 
 } else {
 	return '<button class="btn btn-danger btnblock"><strong><i class="fa fa-droplet"></i> 
	Bahaya</strong></button>';
 }
 }
 }]
 } );
 } );
</script>
<script src="https://code.jquery.com/jquery3.5.1.js"></script>
<script 
src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables
.min.js"></script>
<link rel="stylesheet" 
href="https://cdn.datatables.net/1.12.1/css/jquery.dataTabl
es.min.css">



<div class="card">
	<div class="card-header">
		<h3 class="card-title">Hasil Data Suhu
		</h3>
		<div class="d-flex justify-content-end mb-3">
			
		</div>
	</div>



	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Waktu/Tanggal</th>
					<th>Nilai Suhu</th>
					<th>Kondisi Mesin</th>
				
				</tr>
			</thead>
			<tbody>

				<?php
				include 'koneksi.php';
				$query_tampil = mysqli_query($koneksi,"SELECT * FROM `sensor_suhu`");
				$no = 1;
				while ($data = mysqli_fetch_array($query_tampil)) {

					?>	
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $data['time_update']?></td>
						<td><?php echo $data['nilai_suhu']?></td>
						<td><?php echo $data['kondisi_mesin']?></td>
						
							
						</td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>

