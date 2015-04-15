<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Statistik Peminjaman</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class='col-lg-12'>
                    <form action="<?php echo site_url('statistik/getTanggal/peminjaman'); ?>" method="POST">
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
            <?php if (isset($isTanggal)) { ?>
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
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">                            
							<b><a href="<?php echo site_url('statistik/shelter'); ?>">Shelter</a></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart-shelter"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			</div>	
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>