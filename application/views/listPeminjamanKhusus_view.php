<!-- Page Content -->
        <!-- ./page-wrapper-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class = "page-header">
						<h1>Daftar Peminjaman Khusus</i></h1>
						<h4>Daftar Seluruh Peminjaman Khusus Sepeda Kuning</h4>
					</div>
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Organisasi</th>
                                            <th>Jumlah Spekun</th>
                                            <th>Tanggal</th>
                                            <th>Keteranganangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          	$i=0; 
											foreach ($daftarPeminjamanKhusus->result_array() as $row) { ?>
                                                <?php $i++; ?> 
												<tr class="odd gradeX">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['Nama']; ?></a></td>
                                                    <td><?php echo $row['Organisasi'];?></td>
                                                    <td><?php echo $row['Jumlah_Spekun'];?></td>
                                                    <td><?php echo $row['Tanggal'] ."-". $row['Bulan'] ."-". $row['Tahun'];?></td>
													<td><?php echo $row['Keterangan'];?></td>
                                                </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->                         
                        </div>
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
    <!-- /#wrapper -->
