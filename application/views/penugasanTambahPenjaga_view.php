<!-- Page Content -->
        <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Penjaga Shelter</h1>
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
									<?php echo validation_errors(); ?>
                                    <?php
										echo form_open('penugasan/doInsert');
										echo "<div class='form-group'>";
										echo "<label>Nama Penjaga</label>";
										$data = array(
													  'name'        => 'NamaPenjaga',
													  'id'          => 'NamaPenjaga',
													  'placeholder' => 'Nama Penjaga',
													  'class'		=> 'form-control',
													  'required'		=> 'required'
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
													  'required'		=> 'required'
													);

										echo form_input($data);
										echo "</div>";
										
										echo "<div class='form-group'>";
										echo "<label>Password</label>";
										$data = array(
													  'name'        => 'Password',
													  'id'          => 'Password',
													  'placeholder' => 'Password',
													  'class'		=> 'form-control',
													  'type'		=> 'password',
													  'required'		=> 'required'
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
													  'required'		=> 'required'
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
													  'required'		=> 'required'
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
													  'required'		=> 'required'
													);

										echo form_input($data);
										echo "</div>";
										
										echo form_submit('TambahPenjaga', 'Tambah Penjaga',"class='btn btn-default'");
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
