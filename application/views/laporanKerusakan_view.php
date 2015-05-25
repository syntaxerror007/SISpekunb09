<!-- Page Content -->
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class = "page-header">
				<h1>Laporan Kerusakan</h1>
				<h4>Daftar Kasus Kerusakan Sepeda Kuning</h4>
			</div>
		</div>
	</div>
				
	<div class="row">
		<div class="panel panel-default">
			<div class="row">
				<div class='col-lg-12'>
					<div class="form-group">
						<form action="<?php echo site_url('laporan/getTanggal/kerusakan'); ?>" method="POST">
							<input type="date" id="start-date" name="start-date" />
							<input type="submit" value="submit"/>
						</form>
					</div>
				</div>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<?php echo $error_message; ?>
				<div class="dataTable_wrapper">
					<?php if ($daftarKerusakanSpekun->num_rows() == 0) echo "<h1>Tidak ada spekun yang rusak</h1>"; else { ?>
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Nomor Spekun</th>
								<th>Tanggal Rusak</th>
								<th>Detail Kerusakan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($daftarKerusakanSpekun->result_array() as $row) { ?>
									<tr class="odd gradeX">
										<td class="center"><?php echo $row['No_Spekun']; ?></td>
										<td class="center"><?php echo $row['Tanggal'] ."-". $row['Bulan'] ."-". $row['Tahun']; ?></td>
										<td class="center"><?php echo $row['Detail']; ?></td>
										<td class="center"><?php echo $row['status']; ?></td>
									</tr>
							<?php }?>
						</tbody>
					</table>
					<?php } ?>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	<!--END OF TABEL-->	
	</div>
	<!-- /.row -->
	<?php if (isset($error_message) && $error_message != '') { echo "<script>alert('".$error_message."');</script>";} ?>
	<!-- /.row -->
</div>
	<script>
		$(document).ready( function () {
			$('#dataTables-example').DataTable( {
				paging: true
			} );
		} );
	</script>
<!-- /#wrapper -->
