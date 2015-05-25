<!-- Page Content -->
        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Formulir Peminjaman</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulir Peminjaman
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
									<?php echo validation_errors(); ?>
                                    <?php
										foreach ($peminjaman->result_array() as $dataPeminjaman)
										{
											echo form_open('formulir/doUpdate');
											$data = array(
														  'name'		=> 'Id',
														  'id'			=> 'Id',
														  'type'		=> 'hidden',
														  'value'		=> $dataPeminjaman["Id_Peminjaman_Khusus"]
														);
											echo form_input($data);
											echo "<div class='form-group'>";
											echo "<label>Nama Kegiatan</label>";
											$data = array(
														  'name'        => 'NamaKegiatan',
														  'id'          => 'NamaKegiatan',
														  'placeholder' => 'Nama Kegiatan',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'value'		=> $dataPeminjaman["Nama"]
														);
											echo form_input($data);
											echo "</div>";
											
											echo "<div class='form-group'>";
											echo "<label>Organisasi</label>";
											$data = array(
														  'name'        => 'Organisasi',
														  'id'          => 'Organisasi',
														  'placeholder' => 'Organisasi',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'value'		=> $dataPeminjaman["Organisasi"]
														);
											echo form_input($data);
											echo "</div>";
											
											echo "<div class='form-group'>";
											echo "<label>Jumlah Spekun</label>";
											$data = array(
														  'name'        => 'Jumlah',
														  'id'          => 'Jumlah',
														  'placeholder' => 'Jumlah Spekun',
														  'class'		=> 'form-control',
														  'type'		=> 'number',
														  'required'	=> 'required',
														  'value'		=> $dataPeminjaman["Jumlah_Spekun"]
														);
											echo form_input($data);
											echo "</div>";
											
											echo "<div class='form-group'>";
											echo "<label>Tanggal</label>";
											if ($dataPeminjaman["Bulan"] < 10){
												$dataPeminjaman["Bulan"] = "0".$dataPeminjaman["Bulan"];
											}
											if ($dataPeminjaman["Tanggal"] < 10){
												$dataPeminjaman["Tanggal"] = "0".$dataPeminjaman["Tanggal"];
											}
											$data = array(
														  'name'        => 'Tanggal',
														  'id'          => 'Tanggal',
														  'placeholder' => 'Tanggal Acara',
														  'class'		=> 'form-control',
														  'type'		=> 'date',
														  'required'	=> 'required',
														  'value'		=> $dataPeminjaman["Tahun"]. "-" .$dataPeminjaman["Bulan"]. "-" .$dataPeminjaman["Tanggal"]
 														);
											echo form_input($data);
											echo "</div>";
											
											echo "<div class='form-group'>";
											echo "<label>Jam Awal(HH:mm)</label>";
											$data = array(
														  'name'        => 'JamAwal',
														  'id'          => 'JamAwal',
														  'placeholder' => 'Jam Awal',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'type'		=> 'time',
														  'value'		=> $dataPeminjaman['Jam_Awal']
														);
											echo form_input($data);
											echo "</div>";
											
											echo "<div class='form-group'>";
											echo "<label>Jam Akhir(HH:mm)</label>";
											$data = array(
														  'name'        => 'JamAkhir',
														  'id'          => 'JamAkhir',
														  'placeholder' => 'Jam Akhir',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'type'		=> 'time',
														  'value'		=> $dataPeminjaman['Jam_Akhir']
														);
											echo form_input($data);
											echo "</div>";
											
											echo "<div class='form-group'>";
											echo "<label>Keterangan</label>";
											$data = array(
														  'name'        => 'Keterangan',
														  'id'          => 'Keterangan',
														  'placeholder' => 'Keterangan',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'value'		=> $dataPeminjaman['Keterangan']
														);
											echo form_input($data);
											echo "</div>";
										}
										echo form_submit('Submit', 'Simpan',"class='btn btn-default'");
										echo form_close();
										
									?>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
