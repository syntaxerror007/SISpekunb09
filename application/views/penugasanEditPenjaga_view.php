<!-- Page Content -->
        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ubah Penjaga Shelter</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Penjaga Shelter
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
									<?php 
										echo $error_message;
									?>
                                    <?php
										foreach ($profilePenjagaShelter->result_array() as $penjaga)
										{
											echo form_open('penugasan/doUpdate');
											
											$data = array(
														  'name'        => 'IdPenjaga',
														  'id'          => 'IdPenjaga',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'type'		=> 'hidden',
														  'value'		=> $penjaga['ID_Penjaga']
														);
											
											echo form_input($data);
											
											echo "<div class='form-group'>";
											echo "<label>Nama Penjaga</label>";
											$data = array(
														  'name'        => 'NamaPenjaga',
														  'id'          => 'NamaPenjaga',
														  'placeholder' => 'Nama Penjaga',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'value'		=> $penjaga['Nama']
														);
											
											echo form_input($data);
											echo "</div>";
											
											echo "<div class='form-group'>";
											echo "<label>Username</label>";
											$data = array(
														  'name'        => 'Username',
														  'id'          => 'Username',
														  'placeholder' => 'Username',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'value'		=> $penjaga['Username']
														);

											echo form_input($data);
											echo "</div>";
											
											echo "<div class='form-group'>";
											echo "<label>Nomor Tanda Pengenal</label>";
											$data = array(
														  'name'        => 'NoKTP',
														  'id'          => 'NoKTP',
														  'placeholder' => 'Nomor Tanda Pengenal',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'value'		=> $penjaga['No_KTP']
														);

											echo form_input($data);
											echo "</div>";
											echo "<div class='form-group'>";
											echo "<label>Nomor Telepon</label>";
											$data = array(
														  'name'        => 'NoTelp',
														  'id'          => 'NoTelp',
														  'placeholder' => 'Nomor Telepon',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'value'		=> $penjaga['No_HP']
														);

											echo form_input($data);
											echo "</div>";
											echo "<div class='form-group'>";
											echo "<label>Alamat</label>";
											$data = array(
														  'name'        => 'Alamat',
														  'id'          => 'Alamat',
														  'placeholder' => 'Alamat',
														  'class'		=> 'form-control',
														  'required'	=> 'required',
														  'value'		=> $penjaga['Alamat']
														);

											echo form_input($data);
											echo "</div>";
										}
										echo form_submit('TambahPenjaga', 'Simpan Perubahan',"class='btn btn-default'");
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
