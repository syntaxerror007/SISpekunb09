   <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
			<div class = "page-header">
				<h1>Laporan Kehilangan</h1>
				<h4>Daftar Sepeda Kuning yang Tidak Kembali</h4>
			</div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <!--INI TABEL-->
        <div class="panel panel-default">
            <div class="row">
                <div class='col-lg-12'>
                    <div class="form-group">
						<form action="<?php echo site_url('laporan/getTanggal/kehilangan'); ?>" method="POST">
							<input type="date" id="start-date" name="start-date" />
							<input type="submit" value="submit"/>
						</form>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="panel-body">
                <?php echo $error_message; ?>
                <div class="dataTable_wrapper">
                    <?php if ($daftarKehilanganSpekun->num_rows() == 0) { echo "<h1>Tidak ada spekun yang hilang</h1>"; }else { ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nomor Spekun</th>
                                <th>Tanggal Hilang</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($daftarKehilanganSpekun->result_array() as $row) { ?>
                            <tr class="odd gradeX">
                                <td class="center"><?php echo $row['No_Spekun']; ?></td>
                                <td><?php echo $row['Tanggal'] ."-". $row['Bulan'] ."-". $row['Tahun']; ?></td>
                                <td class="center"><?php if ($row['Status'] == null || $row['Status'] == 0) echo "Belum Ditemukan"; else echo "Sudah Ditemukan";?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
                <!-- /.table-responsive -->                        
            </div>
			<?php if (isset($error_message) && $error_message != '') { echo "<script>alert('".$error_message."');</script>";} ?>
            <!-- /.panel-body -->
        </div>
        <script>
			$(document).ready( function () {
				$('#dataTables-example').DataTable();
			} );
		</script>
    </div>
        <!-- /.panel -->
				<!--END OF TABEL-->