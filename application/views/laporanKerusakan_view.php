<!-- Page Content -->
        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Kerusakan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		
            <div class="row">
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
                        <div class="panel-heading">
                            Laporan Kerusakan Sepeda Kuning
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
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
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
				<!--END OF TABEL-->	
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
