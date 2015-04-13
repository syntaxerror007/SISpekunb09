<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profil Penjaga Shelter</h1>
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
									<?php if ($page_loc == "Mahasiswa") { ?>
										<thead>

										<?php foreach($profilePeminjam->result_array() as $row) {?>
										<tr>
											<th>Nama</th>
											<th><?php echo $row['Nama']; ?></th>
										</tr>
										</thead>
										<tbody>
											<tr>
												<td>NPM</td>
												<td><?php echo $row['NPM']; ?></td>
											</tr>
											<tr>
												<td>Fakultas</td>
												<td><?php echo $row['Fakultas']; ?></td>
											</tr>
										</tbody>
										<?php } ?>
								<?php } else { ?>
									<thead>
										<?php foreach($profilePeminjam->result_array() as $row) {?>
										<tr>
											<th>Nama</th>
											<th><?php echo $row['Nama']; ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Nomor KTP</td>
											<td><?php echo $row['No_KTP']; ?></td>
										</tr>
										<tr>
											<td>Pekerjaan</td>
											<td><?php echo $row['Pekerjaan']; ?></td>
										</tr>
									</tbody>
									<?php } ?>
								<?php }?>
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