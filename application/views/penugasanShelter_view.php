    <!-- ./page-wrapper-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
					<div class = "page-header">
						<h1>Laporan Penugasan</h1>
						<h4>Daftar Penjaga pada Setiap <i>Shelter</i> Sepeda Kuning</h4>
					</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php if ($error_message != "") echo "<script>alert('".$error_message."');</script>"; ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">				
				<!--INI TABEL-->
                    <div class="panel panel-default">
                        <div class="row">
							<form action="<?php echo site_url('penugasan/getTanggal'); ?>" method="POST">
								<div class="form-group">
									<div class="col-lg-12">
										<h5>Masukkan tanggal</h5>
										<input type="date" id="start-date" name="start-date" />
									</div>
									<div class="col-lg-4">
										<input type="submit" value="Lihat"/>
									</div>
								</div>
							</form>
						</div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php if ($daftar_Shelter->num_rows() != 0) {?>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Shelter</th>
                                            <th>Nama Petugas</th>
                                            <th>Nomor Device</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                            $i = 0;
                                            foreach ($daftar_Shelter->result_array() as $row) { ?>
                                                <?php $i++; ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['NamaShelter'];?></td>
                                                    <td><a href="<?php echo site_url("penugasan/profile/".$row['IDPenjaga']); ?>"><?php echo $row['NamaPenjaga']; ?></a></td>
                                                    <td><?php echo $row['No_Device'];?></td>
                                                </tr>
                                        <?php }?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <?php } else echo "<h1>Tidak ada penugasan shelter</h1>"; ?>
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
