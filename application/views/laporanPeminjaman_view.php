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
								<div class="calendar-container"></div>
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
	
			<script>
				(function() {
					var calendar = [
						["January", 31],
						["February", 28],
						["March", 31],
						["April", 30],
						["May", 31],
						["June", 30],
						["July", 31],
						["August", 31],
						["September", 30],
						["October", 31],
						["November", 30],
						["December", 31]
						],
						cont = document.getElementById('calendar-container');

					var sel_year = document.createElement('select'),
						sel_month = document.createElement('select'),
						sel_day = document.createElement('select');

					function createOption(txt, val) {
						var option = document.createElement('option');
						option.value = val;
						option.appendChild(document.createTextNode(txt));
						return option;
					}

					function clearChildren(ele) {
						while (ele.hasChildNodes()) {
							ele.removeChild(ele.lastChild);
						}
					}

					function recalculateDays() {
						var month_index = sel_month.value,
							df = document.createDocumentFragment();
						for (var i = 0, l = calendar[month_index][1]; i < l; i++) {
							df.appendChild(createOption(i + 1, i));
						}
						clearChildren(sel_day);
						sel_day.appendChild(df);
					}

					function generateMonths() {
						var df = document.createDocumentFragment();
						calendar.forEach(function(info, i) {
							df.appendChild(createOption(info[0], i));
						});
						clearChildren(sel_month);
						sel_month.appendChild(df);
					}

					sel_month.onchange = recalculateDays;

					generateMonths();
					recalculateDays();

					cont.appendChild(sel_year);
					cont.appendChild(sel_month);
					cont.appendChild(sel_day);
				}());​
			</script>
</div>