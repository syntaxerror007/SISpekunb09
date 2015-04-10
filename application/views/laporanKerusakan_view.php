<!-- Page Content -->
        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Kerusakan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		
            <div class="row">
                <!--INI TABEL-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Spekun Rusak
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor Spekun</th>
                                            <th>Tanggal Rusak</th>
                                            <th>Tanggal Diperbaiki</th>
                                            <th>Status</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($daftar_Kerusakan as $row) { ?>
                                                <tr class="odd gradeX">
                                                    <td class="center"><?php echo $row['No Spekun']; ?></td>
                                                    <td class="center"><?php echo $row['Tanggal']; ?></td>
                                                    <td class="center">huhu</td>
                                                    <td >hehe</td>
                                                </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
				<!--END OF TABEL-->	
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
