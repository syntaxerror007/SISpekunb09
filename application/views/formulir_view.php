
<?php
		// define variables and set to empty values
		$nameErr = $fakultaslErr = $tanggalErr = $jumlahErr = $jamAwalErr = $jamAkhirErr = $keteranganErr = "";
		$name = $fakultas = $tanggal = $jumlah = $jamAwal = $jamAkhir = $keterangan = "";
		$validName = $validTanggal = $validJumlah = $validKeterangan = "";
		$sukses = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			if (empty($_POST["name"])){
				$nameErr = "Nama harus diisi"; 
				$validName = "";
			}
			else{
			
				$name = test_input($_POST["name"]);
				// check if name only contains letters and whitespace
		
				if (!preg_match("/^[a-zA-Z ]*$/",$name)){

					$nameErr = "Nama hanya boleh huruf atau spasi";
					$validName = "gagal";
				}
				else{
					$validName = "sukses";
				}
			
			}
			
			if (empty($_POST["tanggal"])){
				$tanggal = "";
			}
			else{
				$tanggal = test_input($_POST["tangal"]);
			}
			
			if (empty($_POST["jumlah"])){
				$jumlah = "";
			}
			else{
				$jumlah = test_input($_POST["jumlah"]);
			}
			
			if (empty($_POST["keterangan"])){
				$keterangan = "";
			}
			else{
				$keterangan = test_input($_POST["keterangan"]);
			}
			// Submit to database
	
			if ($validName == "sukses") {
				$sukses = "Formulir sudah disimpan";
				$sendQuery = "insert into komentar values (" 
							. "'" . $name . "', "
							. "'" . $fakultas . "', "
							. "'" . $tanggal . "', 0"
							. "'" . $jumlah . "', 0"
							. "'" . $jamAwal . "', 0"
							. "'" . $jamAkhir . "', 0"
							. "'" . $keterangan . "', 0"
							. ")";
				$this->db->query($sendQuery);
				header('Location: comment');
			}

		}
		function test_input($data){
			echo $data;
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
?>

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
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Nama Peminjaman</label>
                                            <input class="form-control" placeholder="Nama Peminjam">
                                        </div>
                                        <div class="form-group">
                                            <label>Fakultas</label>
                                            <input class="form-control" placeholder="Fakultas">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" placeholder="DD-MM-YYYY">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Spekun</label>
                                             <input class="form-control" placeholder="Jumlah Spekun">
                                        </div>
										<div class="form-group">
                                            <label>Jam Awal</label>
                                             <input class="form-control" placeholder="Jam Awal">
                                        </div>
										<div class="form-group">
                                            <label>Jam Akhir</label>
                                             <input class="form-control" placeholder="Jam Akhir">
                                        </div>
										
										<div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
										
									   <button type="submit" class="btn btn-default">Simpan</button>
                                       
                                    </form>
                                </div>
								
                                <!-- 
                                <div class="col-lg-6">
                                    <h1>Disabled Form States</h1>
                                    <form role="form">
                                        <fieldset disabled>
                                            <div class="form-group">
                                                <label for="disabledSelect">Disabled input</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">Disabled select menu</label>
                                                <select id="disabledSelect" class="form-control">
                                                    <option>Disabled select</option>
                                                </select>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">Disabled Checkbox
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Disabled Button</button>
                                        </fieldset>
                                    </form>
                                    <h1>Form Validation States</h1>
                                    <form role="form">
                                        <div class="form-group has-success">
                                            <label class="control-label" for="inputSuccess">Input with success</label>
                                            <input type="text" class="form-control" id="inputSuccess">
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="control-label" for="inputWarning">Input with warning</label>
                                            <input type="text" class="form-control" id="inputWarning">
                                        </div>
                                        <div class="form-group has-error">
                                            <label class="control-label" for="inputError">Input with error</label>
                                            <input type="text" class="form-control" id="inputError">
                                        </div>
                                    </form>
                                    <h1>Input Groups</h1>
                                    <form role="form">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-eur"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Font Awesome Icon">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
														-->
								
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