<!-- Page Content -->
        <!-- ./page-wrapper-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Penjaga Shelter</h1>
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
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>ID</th>
                                            <th>Password</th>
                                            <th>Mulai Bekerja</th>
                                            <th>Selesai Bekerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          	$i=0; 
											foreach ($daftarPenjagaShelter->result_array() as $row) { ?>
                                                <?php $i++; ?> 
												<tr class="odd gradeX">
                                                    <td><?php echo $i; ?></td>
                                                    <td><a href="<?php echo site_url("penugasan/profile/".$row['ID_Penjaga']); ?>"><?php echo $row['Nama']; ?></a></td>
                                                    <td><?php echo $row['ID_Penjaga'];?></td>
                                                    <td><?php echo $row['Password'];?></td>
                                                    <td><?php echo $row['Mulai_Bekerja'];?></td>
                                                    <td><?php if ($row['Selesai_Bekerja'] == null) echo "Masih Bekerja"; else echo $row['Selesai_Bekerja'];?></td>
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
                <!-- /.col-lg-12 -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
