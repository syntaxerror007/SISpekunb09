<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data yang baru Anda masukkan</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
			<!--INI TABEL-->
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
									<?php foreach($peminjamanTerakhir->result_array() as $row) {?>
                                    <tr>
                                        <th>Nama Kegiatan</th>
                                        <th><?php echo $row['Nama']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
									<tr>
										<td>Organisasi</td>
										<td><?php echo $row['Organisasi']; ?></td>
									</tr>
									
									<tr>
										<td>Jumlah Spekun</td>
										<td><?php echo $row['Jumlah_Spekun']; ?></td>
									</tr>
									
									<tr>
										<td>Tanggal Acara</td>
										<td><?php echo $row['Tanggal'] ."-". $row['Bulan'] ."-". $row['Tahun']; ?></td>
									</tr>
									
									<tr>
										<td>Jam Awal</td>
										<td><?php echo $row['Jam_Awal']; ?></td>
									</tr>
									
									<tr>
										<td>Jam Akhir</td>
										<td><?php echo $row['Jam_Akhir']; ?></td>
									</tr>
									
									<tr>
										<td>Keterangan</td>
										<td><?php echo $row['Keterangan']; ?></td>
									</tr>
                                </tbody>
								<?php } ?>
                            </table>
		                </div>
                    </div>
					<a href="<?php echo base_url().'peminjamanKhusus/editPeminjamanKhusus/'.$peminjamanTerakhir->result_array()[0]['Id_Peminjaman_Khusus']; ?>">Ubah</a>
				
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
			<!--END OF TABEL-->	
            </div>
            <!-- /.col-lg-12 -->
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>