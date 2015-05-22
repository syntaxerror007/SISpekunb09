<!-- Page Content -->
        <!-- ./page-wrapper-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Peminjaman Khusus</h1>
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
                            <?php if ($daftarPeminjamanKhusus->num_rows() == 0) echo "<h1>Belum ada peminjaman khusus</h1>"; else { ?>
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
                            <?php } ?>
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
        <script>
            $(document).ready( function () {
                $('#dataTables-example').DataTable();
            } );
        </script>
    </div>
    <!-- /#wrapper -->
