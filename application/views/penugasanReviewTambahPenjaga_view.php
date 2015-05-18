<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Your Input</h1>
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
									<?php foreach($peminjamanTerakhir->result_array() as $row) {?>
                                    <tr>
                                        <th>Nama Penjaga</th>
                                        <th><?php echo $row['Nama']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
									<tr>
										<td>Username</td>
										<td><?php echo $row['Username']; ?></td>
									</tr>
									
									<tr>
										<td>Password</td>
										<td><?php echo $row['Password']; ?></td>
									</tr>
									
									<tr>
										<td>Nomor Tanda Pengenal</td>
										<td><?php echo $row['No_KTP']; ?></td>
									</tr>
									
									<tr>
										<td>Nomor Telepon</td>
										<td><?php echo $row['No_HP']; ?></td>
									</tr>
									
									<tr>
										<td>Alamat</td>
										<td><?php echo $row['Alamat']; ?></td>
									</tr>
									
									<tr>
										<td>Status</td>
										<td><?php if ($row['Status'] == 0 ) echo "Tidak Aktif"; else echo "Aktif"; ?></td>
									</tr>
                                </tbody>
								<?php } ?>
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