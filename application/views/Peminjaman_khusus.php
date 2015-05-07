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
										echo form_open('formulir/doInsert');
										echo "<div class='form-group'>";
										echo "<label>Nama Kegiatan</label>";
										$data = array(
													  'name'        => 'NamaKegiatan',
													  'id'          => 'NamaKegiatan',
													  'placeholder' => 'Nama Kegiatan',
													  'class'		=> 'form-control',
													  'required'	=> 'required'
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
													  'required'	=> 'required'
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
													  'required'	=> 'required'
													);
										echo form_input($data);
										echo "</div>";
										
										echo "<div class='form-group'>";
										echo "<label>Tanggal</label>";
										$data = array(
													  'name'        => 'Tanggal',
													  'id'          => 'Tanggal',
													  'placeholder' => 'Tanggal Acara',
													  'class'		=> 'form-control',
													  'type'		=> 'date',
													  'required'	=> 'required'
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
													  'type'		=> 'time'
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
													  'type'		=> 'time'
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
													  'required'	=> 'required'
													);
										echo form_input($data);
										echo "</div>";
										
										echo form_submit('Submit', 'Submit',"class='btn btn-default'");
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
