<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <div class = "page-header">
						<h1>Statistik Kerusakan</h1>
						<h4>Data Seluruh Kasus Kerusakan Sepeda Kuning Untuk Setiap Hari, Setiap Bulan, dan Setiap Tahun<</h4>
					</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php if (isset($error_message) && $error_message != "") echo "<script>alert('".$error_message."');</script>"; ?>
            <div class="row">
                <div class='col-lg-12'>
                    <form action="<?php echo site_url('statistik/getTanggal/kerusakan'); ?>" method="POST">
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
            </div>
			<?php if (isset($isTanggal) && $isTanggal != "") { ?>
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
								foreach ($statistikKerusakan->result_array() as $row) { ?>
									<tr class="odd gradeX">
										<td class="center"><?php echo $row['No_Spekun']; ?></td>
										<td class="center"><?php echo $row['Tanggal'] ."-". $row['Bulan'] ."-". $row['Tahun']; ?></td>
										<td class="center"><?php echo $row['Detail']; ?></td>
										<td class="center"><?php echo $row['status']; ?></td>
									</tr>
							<?php }?>
						</tbody>
					</table>
			<?php } else { ?>
			<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Days</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart-hari"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
            </div>
			
			<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Month</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart-bulan"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
				<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Years</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart-tahun"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			<?php } ?>
        </div>
    </div>
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
            cont = document.getElementById('calendar-container');

        var sel_year = document.createElement('select'),
            sel_month = document.createElement('select'),
            sel_day = document.createElement('select');
        sel_day.setAttribute("name","tanggal");
        sel_month.setAttribute("name","bulan");
        sel_year.setAttribute("name","tahun");
        
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
            
            var month_index = sel_month.value, 
                df = document.createDocumentFragment();
            if (month_index == -1)
            {
                month_index = 1;
            }
            
            df.appendChild(createOption("Pilih Tanggal",-1));
            for (var i = 0, l = calendar[month_index-1][1]; i < l; i++) {
                df.appendChild(createOption(i + 1, i+1));
            }
            clearChildren(sel_day);
            sel_day.appendChild(df);
            sel_day.selectedIndex = date_index;
        }
        
        function generateYears() {
            var df = document.createDocumentFragment();
            df.appendChild(createOption("Pilih Tahun",-1));
            for (var i = 2010; i < 2020; i++) {
                df.appendChild(createOption(i, i));
            }
            clearChildren(sel_year);
            sel_year.appendChild(df);
        }

        function generateMonths() {
            var df = document.createDocumentFragment();
                df.appendChild(createOption("Pilih Bulan", -1));
            calendar.forEach(function(info, i) {
                df.appendChild(createOption(info[0], i+1));
            });
            
            clearChildren(sel_month);
            sel_month.appendChild(df);
        }

        sel_month.onchange = recalculateDays;

        generateYears();
        generateMonths();
        recalculateDays();

        cont.appendChild(sel_day);
        cont.appendChild(sel_month);
        cont.appendChild(sel_year);
        
    </script>