 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Peminjaman</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
				<!--INI TABEL-->
                    <div class="panel panel-default">
                        <div class="row">
							<div class='col-lg-4'>
								<div class="form-group">
									<div class='input-group date' id='datetimepicker1'>
										<input type='text' class="form-control" />
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
						</div>
						
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
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
                                            foreach ($daftar_Peminjaman as $row) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $row['Tanggal']; ?></td>
                                                    <td><a href="profil_peminjam.html"><?php echo $row['Nama Peminjam']; ?></a></td>
                                                    <td>huhu</td>
                                                    <td class="center">hehe</td>
                                                    <td class="center">hoho</td>
                                                    <td>haha</td>
                                                </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
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
