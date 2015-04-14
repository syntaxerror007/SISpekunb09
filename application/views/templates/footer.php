
    <!-- jQuery -->
    <script src="<?php echo site_url('./bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url(''); ?>./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo site_url(''); ?>./bower_components/metisMenu/dist/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url(''); ?>./dist/js/sb-admin-2.js"></script>
	
    <!-- Flot Charts JavaScript -->
    <script src="<?php echo site_url('./bower_components/flot/excanvas.min.js'); ?>"></script>
    <script src="<?php echo site_url('./bower_components/flot/jquery.flot.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('./bower_components/flot/jquery.flot.pie.js'); ?>"></script>
    <script src="<?php echo site_url('./bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js'); ?>"></script>
	
	<?php if ($page_loc == "Statistik Kerusakan" || $page_loc == 'Statistik Peminjaman') {?>
	<script>
		//Flot Line Chart
			var namaBulan = [];
			namaBulan[1] = "Januari";
			namaBulan[2] = "Februari";
			namaBulan[3] = "Maret";
			namaBulan[4] = "April";
			namaBulan[5] = "Mei";
			namaBulan[6] = "Juni";
			namaBulan[7] = "Juli";
			namaBulan[8] = "Agustus";
			namaBulan[9] = "September";
			namaBulan[10] = "Oktober";
			namaBulan[11] = "November";
			namaBulan[12] = "Desember";
			var hari = [];
			hari[1] = "Senin";
			hari[2] = "Selasa";
			hari[3] = "Rabu";
			hari[4] = "Kamis";
			hari[5] = "Jumat";
			hari[6] = "Sabtu";
			hari[7] = "Minggu";
		$(document).ready( $(function() {
			var ticksHari = [<?php
				$i=0;
				if ($statistikMingguan->num_rows() != 0)
				{
					foreach ($statistikMingguan->result_array() as $row)
					{
						if ($i == $statistikMingguan->num_rows()-1)
							echo '['.$i.',hari['.$row['Hari'].']]';
						else
							echo '['.$i.',hari['.$row['Hari'].']],';
						$i++;
					}
				}
			?>];
			var barOptions = {
				series: {
					bars: {
						align:"center",
						show: true
					}
				},
				grid: {
					hoverable: true
				},
				legend: {
					show: false
				},
				tooltip: true,
				tooltipOpts: {
					content: "Hari: %x, Jumlah: %y"
				},
				xaxis: {
					axisLabel: "Hari",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Verdana, Arial',
					axisLabelPadding: 10,
					ticks: ticksHari
				}
			};
			var barData = {
				label: "bar",
				data: [
				<?php
					$i = 0;
					foreach ($statistikMingguan->result_array() as $row) {
						if ($i == $statistikMingguan->num_rows()-1)
						{
							echo '['.$i.', '.$row['count'].']';
						}
						else
						{
							echo '['.$i.', '.$row['count'].'],';
						}
						$i++;
					}
				?>
				]
			};
			$.plot($("#flot-bar-chart-hari"), [barData], barOptions);
			

			var dataShelter = [<?php
				$i=0;
				foreach ($statistikBulanan->result_array() as $row)
				{
					if ($i == $statistikBulanan->num_rows()-1)
						echo '{label: namaBulan['.$row["Bulan"].'], data:'.$row["count"].'}';
					else
						echo '{label: namaBulan['.$row["Bulan"].'], data:'.$row["count"].'},';
					$i++;
				}
			?>];

			var plotObj = $.plot($("#flot-bar-chart-bulan"), dataShelter, {
				series: {
					pie: {
						show: true,
						radius:150
					}
				},
				grid: {
					hoverable: true
				},
				tooltip: true,
				tooltipOpts: {
					content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
					shifts: {
						x: 20,
						y: 0
					},
					defaultTheme: false
				}
			});
			var ticksTahun = [<?php
				$i=0;
				foreach ($statistikTahunan->result_array() as $row)
				{
					if ($i == $statistikTahunan->num_rows()-1)
						echo '['.$i.',"'.$row['Tahun'].'"]';
					else
						echo '['.$i.',"'.$row['Tahun'].'"],';
					$i++;
				}
			?>];
		 
			var barOptions = {
				series: {
					bars: {
						align:"center",
						show: true
					}
				},
				grid: {
					hoverable: true
				},
				legend: {
					show: false
				},
				tooltip: true,
				tooltipOpts: {
					content: "Tahun: %x, Jumlah: %y"
				},
				xaxis: {
					axisLabel: "Tahun",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Verdana, Arial',
					axisLabelPadding: 10,
					minTickSize: 1,
					ticks: ticksTahun
				}
			};
			var barData = {
				label: "bar",
				data: [<?php
					$i = 0;
					foreach ($statistikTahunan->result_array() as $row) {
						if ($i == $statistikTahunan->num_rows()-1)
						{
							echo '['.$i.', '.$row['count'].']';
						}
						else
						{
							echo '['.$i.', '.$row['count'].'],';
						}
						$i++;
					}
				?>]
			};
			$.plot($("#flot-bar-chart-tahun"), [barData], barOptions);
			<?php if ($page_loc != "Statistik Kerusakan") { ?>
			var dataShelter = [<?php
				$i=0;
				foreach ($statistikPeminjamanPerShelter->result_array() as $row)
				{
					if ($i == $statistikPeminjamanPerShelter->num_rows()-1)
						echo '{label: "'.$row["Lokasi_Peminjaman"].'", data:'.$row["count"].'}';
					else
						echo '{label: "'.$row["Lokasi_Peminjaman"].'", data:'.$row["count"].'},';
					$i++;
				}
			?>];

			var plotObj = $.plot($("#flot-pie-chart-shelter"), dataShelter, {
				series: {
					pie: {
						show: true,
						radius:150
					}
				},
				grid: {
					hoverable: true
				},
				tooltip: true,
				tooltipOpts: {
					content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
					shifts: {
						x: 20,
						y: 0
					},
					defaultTheme: false
				}
			});
			<?php } ?>
		}));
	</script>
	<?php }?>
	
	
</body>

</html>
