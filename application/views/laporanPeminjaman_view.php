<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
				<div class = "page-header">
					<h1>Laporan Peminjaman</h1>
					<h4>Daftar Seluruh Transaksi Peminjaman Sepeda Kuning</h4>
				</div>
                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
			<!--INI TABEL-->
                <div class="panel panel-default">
                    <div class="row">
						<div class='col-lg-12'>
							<form action="<?php echo site_url('laporan/getTanggal/peminjaman'); ?>" method="POST">
								<input type="date" id="start-date" name="start-date" />
								<input type="date" id="end-date" name="end-date" />
								<input type="submit" value="submit"/>
							</form>
						</div>
					</div>
					
                    <!-- /.panel-heading -->
                    <div class="panel-body">
						<?php echo $error_message; ?>
                        <div class="dataTable_wrapper">
                        	<?php if ($daftarPeminjaman->num_rows() == 0) { echo "<h1>Tidak ada peminjaman</h1>";} else { ?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
										<th>Nama Peminjam</th>
                                        <th>Nomor Spekun</th>
                                        <th>Lokasi Peminjaman</th>
                                        <th>Lokasi Pengembalian</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($daftarPeminjaman->result_array() as $row) { ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $row['Tanggal'] ."-". $row['Bulan'] ."-". $row['Tahun']; ?></td>
												<td><a href="<?php echo site_url('profile/Mahasiswa/'.$row['NPM_Mahasiswa']);?>"><?php echo $row['Nama']; ?></a></td>
                                                <td><?php echo $row['No_Spekun']; ?></td>
                                                <td><?php echo $row['Lokasi_Peminjaman']; ?></td>
                                                <td><?php echo $row['Lokasi_Kembali']; ?></td>
                                                <td><?php if ($row['Status'] == null || $row['Status'] == 0) echo "Belum Kembali"; else echo "Sudah Kembali";?></td>
                                            </tr>
                                    <?php }?>
                                    <?php
                                        foreach ($daftarPeminjamanNonMahasiswa->result_array() as $row) { ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $row['Tanggal'] ."-". $row['Bulan'] ."-". $row['Tahun']; ?></td>
												<td><a href="<?php echo site_url('profile/NonMahasiswa/'.$row['ID_Non_Mahasiswa']);?>"><?php echo $row['Nama']; ?></a></td>
                                                <td><?php echo $row['No_Spekun']; ?></td>
                                                <td><?php echo $row['Lokasi_Peminjaman']; ?></td>
                                                <td><?php echo $row['Lokasi_Kembali']; ?></td>
                                                <td><?php if ($row['Status'] == null || $row['Status'] == 0) echo "Belum Kembali"; else echo "Sudah Kembali";?></td>
                                            </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
			<!--END OF TABEL-->	
			
			<?php if (isset($error_message) && $error_message != '') { echo "<script>alert('".$error_message."');</script>";} ?>
            </div>
            <!-- /.col-lg-12 -->
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
	<script>
		$(document).ready( function () {
			$('#dataTables-example').DataTable();
		} );
	</script>
</div>