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
								
									<?php foreach($profilePenjagaShelter->result_array() as $row) {?>
                                    <tr>
                                        <th>Nama</th>
                                        <th><?php echo $row['Username']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
									<tr>
										<td>Nomor KTP</td>
										<td><?php echo $row['No_KTP']; ?></td>
									</tr>
									<tr>
										<td>Nomor Telepon</td>
										<td><?php echo $row['No_HP']; ?></td>
									</tr>
									<tr>
										<td>Mulai Bekerja</td>
										<td><?php echo $row['Mulai_Bekerja']; ?></td>
									</tr>
									<tr>
										<td>Selesai Bekerja</td>
										<td><?php if ($row['Selesai_Bekerja'] == NULL || $row['Selesai_Bekerja'] == "")
													{
														echo "Masih Bekerja";
													}
												  else
												  {
														echo $row['Selesai_Bekerja'];
												  } ?></td>
									</tr>
									<tr>
										<td>Status</td>
										<td><?php if ($row['Status'] == NULL || $row['Status'] == "") { echo "Aktif"; }else {echo "Tidak Aktif";} ?></td>
									</tr>
                                </tbody>
								<?php } ?>
                            </table>
							<button onclick="myFunction()">Nonaktifkan Petugas</button> <br>
								<a href="editPetugas_view.php">Edit Data Petugas</a>
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