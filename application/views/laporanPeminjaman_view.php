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
						<div class='col-lg-12'>
							<form action="<?php echo site_url('laporan/getTanggal/peminjaman'); ?>" method="POST">
								<div class="form-group">
									<div class="col-lg-6">
										<h5>Masukkan tanggal awal</h5>
										<div id="calendar-container-awal"></div>
									</div>
									<div class="col-lg-6">
										<h5>Masukkan tanggal akhir</h5>
										<div id="calendar-container-akhir"></div>
									</div>
									<div class="col-lg-4">
										<input type="submit">
									</div>
								</div>
							</form>
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
			
			<?php if (isset($error_message) && $error_message != '') { echo "<script>alert('".$error_message."');</script>";} ?>
            </div>
            <!-- /.col-lg-12 -->
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
	<script>
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
			cont = document.getElementById('calendar-container-awal'),
			cont2 = document.getElementById('calendar-container-akhir');

		var sel_year = document.createElement('select'),
			sel_month = document.createElement('select'),
			sel_day = document.createElement('select');
		var sel_year2 = document.createElement('select'),
			sel_month2 = document.createElement('select'),
			sel_day2 = document.createElement('select');
		
		sel_day.setAttribute("name","tanggalAwal");
		sel_month.setAttribute("name","bulanAwal");
		sel_year.setAttribute("name","tahunAwal");
		
		sel_day2.setAttribute("name","tanggalAkhir");
		sel_month2.setAttribute("name","bulanAkhir");
		sel_year2.setAttribute("name","tahunAkhir");
		
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
			var date_index = sel_day.value;
			var date_index2 = sel_day2.value;
			
			var month_index = sel_month.value, month_index2 = sel_month2.value,
				df = document.createDocumentFragment(), df2 = document.createDocumentFragment();
			if (month_index == -1)
			{
				month_index = 1;
			}
			if (month_index2 == -1)
			{
				month_index2 = 1;
			}
			
			df.appendChild(createOption("Pilih Tanggal",-1));
			df2.appendChild(createOption("Pilih Tanggal",-1));
			for (var i = 0, l = calendar[month_index-1][1]; i < l; i++) {
				df.appendChild(createOption(i + 1, i+1));
			}
			for (var i = 0, l = calendar[month_index2-1][1]; i < l; i++) {
				df2.appendChild(createOption(i + 1, i+1));
			}
			clearChildren(sel_day);
			sel_day.appendChild(df);
			sel_day.selectedIndex = date_index;
			clearChildren(sel_day2);
			sel_day2.appendChild(df2);
			sel_day2.selectedIndex = date_index2;
		}
		
		function generateYears() {
			var df = document.createDocumentFragment();
			var df2 = document.createDocumentFragment();
			df.appendChild(createOption("Pilih Tahun",-1));
			df2.appendChild(createOption("Pilih Tahun",-1));
			for (var i = 2010; i < 2020; i++) {
				df.appendChild(createOption(i, i));
				df2.appendChild(createOption(i, i));
			}
			clearChildren(sel_year);
			sel_year.appendChild(df);
			clearChildren(sel_year2);
			sel_year2.appendChild(df2);
		}

		function generateMonths() {
			var df = document.createDocumentFragment();
			var df2 = document.createDocumentFragment();
				df.appendChild(createOption("Pilih Bulan", -1));
				df2.appendChild(createOption("Pilih Bulan", -1));
			calendar.forEach(function(info, i) {
				df.appendChild(createOption(info[0], i+1));
				df2.appendChild(createOption(info[0], i+1));
			});
			
			clearChildren(sel_month);
			sel_month.appendChild(df);
			clearChildren(sel_month2);
			sel_month2.appendChild(df2);
		}

		sel_month.onchange = recalculateDays;
		sel_month2.onchange = recalculateDays;

		generateYears();
		generateMonths();
		recalculateDays();

		cont.appendChild(sel_day);
		cont.appendChild(sel_month);
		cont.appendChild(sel_year);
		
		cont2.appendChild(sel_day2);
		cont2.appendChild(sel_month2);
		cont2.appendChild(sel_year2);
		
	</script>
</div>