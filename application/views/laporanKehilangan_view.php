   <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan Kehilangan Spekun</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <!--INI TABEL-->
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar sepeda kuning yang belum ditemukan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nomor Spekun</th>
                                <th>Tanggal Hilang</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($daftarKehilanganSpekun->result_array() as $row) { ?>
                            <tr class="odd gradeX">
                                <td class="center"><?php echo $row['No_Spekun']; ?></td>
                                <td><?php echo $row['Tanggal'] ."-". $row['Bulan'] ."-". $row['Tahun']; ?></td>
                                <td class="center"><?php if ($row['Status'] == null || $row['Status'] == 0) echo "Belum Ditemukan"; else echo "Sudah Ditemukan";?></td>
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