	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.KOTAK-KOTAK DI ATAS -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalSpekunRusak; ?></div>
                                    <div>Spekun Rusak</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('laporan/kerusakan'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalSpekunKembali; ?></div>
                                    <div>Spekun Dikembalikan</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('laporan/kerusakan'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $avgSpekunDipinjam; ?></div>
                                    <div>Rataan Peminjaman</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('laporan/kerusakan'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalSpekunDipinjam; ?></div>
                                    <div>Spekun Dipinjam</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('laporan/kerusakan'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Penugasan Hari Ini
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <?php if ($penugasanHariIni->num_rows() == 0) echo "<h1>Belum ada penugasan hari ini</h1>"; else {?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Lokasi Shelter</th>
                                            <th>Nama Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            foreach ($penugasanHariIni->result_array() as $penugasan ) {
                                            $i++; ?>
                                            <?php if ($i % 2 == 0) {?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $penugasan['NamaShelter']; ?></td>
                                                    <td><a href="profil_petugas.html"><?php echo $penugasan['NamaPenjaga']; ?></a></td>
                                                </tr>
                                            <?php } else { ?>
                                                <tr class="even gradeC">
                                                    <td><?php echo $penugasan['NamaShelter']; ?></td>
                                                    <td><a href="profil_petugas.html"><?php echo $penugasan['NamaPenjaga']; ?></a></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
            <!-- /.row -->
    </div>

