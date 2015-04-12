<?php
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods : *");
	header("Access-Control-Allow-Headers : Authorization, X-Requested-With, Content-Type, Origin, Accept");
	header("Access-Control-Allow-Credentials : true");
	
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'SISpekun';

	$con = mysqli_connect('localhost', $dbuser, $dbpass, $dbname) or die('Terjadi masalah dalam koneksi ke database');
	
	function InsertNewPeminjaman($namaShelterPinjam,$noSpekun,$idPeminjam,$tipePeminjam) {
		global $con;

		$namaShelterPinjam = mysqli_real_escape_string($con, stripslashes($namaShelterPinjam));
		$noSpekun = mysqli_real_escape_string($con, stripslashes($noSpekun));
		$idPeminjam = mysqli_real_escape_string($con, stripslashes($idPeminjam));
		$tipePeminjam = mysqli_real_escape_string($con, stripslashes($tipePeminjam));
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_Peminjaman = date("h:i:s");
		$retval;
		if ($tipePeminjam == "Mahasiswa")
		{
			$status = mysqli_query($con, "INSERT INTO PEMINJAMAN (Tanggal, Bulan, Tahun, Jam_Peminjaman, Lokasi_Peminjaman,No_Spekun,NPM_Mahasiswa) values ('$tanggal', '$bulan', '$tahun', '$jam_Peminjaman', '$namaShelterPinjam','$noSpekun','$idPeminjam')");
			$retval = array('status' => $status);
		}
		else
		{
			$status = mysqli_query($con, "INSERT INTO PEMINJAMAN (Tanggal, Bulan, Tahun, Jam_Peminjaman, Lokasi_Peminjaman,No_Spekun,ID_Non_Mahasiswa) values ('$tanggal', '$bulan', '$tahun', '$jam_Peminjaman','$namaShelterPinjam','$noSpekun','$idPeminjam')");
			
			$retval = array('status' => $status);
		}
		return $retval;
	}
	
	function InsertNewPeminjam($idPeminjam, $tipePeminjam, $namaPeminjam, $fakultasPeminjam)
	{
		global $con;

		$namaPeminjam = mysqli_real_escape_string($con, stripslashes($namaPeminjam));
		$fakultasPeminjam = mysqli_real_escape_string($con, stripslashes($fakultasPeminjam));
		$idPeminjam = mysqli_real_escape_string($con, stripslashes($idPeminjam));
		$tipePeminjam = mysqli_real_escape_string($con, stripslashes($tipePeminjam));
		
		$retval;
		if ($tipePeminjam == "Mahasiswa")
		{
			$status = mysqli_query($con, "INSERT INTO MAHASISWA VALUES ('$namaPeminjam','$idPeminjam','$fakultasPeminjam')");
			$retval = array('status'=> $status);
		}
		else
		{
			$status = mysqli_query($con, "INSERT INTO NON_MAHASISWA (Nama, No_KTP, Pekerjaan) VALUES ('$namaPeminjam','$idPeminjam','$tipePeminjam')");
			$retval = array('status'=> $status);
		}
		
		return $retval;
	}

	function DoPengembalian($namaShelterKembali, $idPeminjam, $tipePeminjam)
	{
		$namaShelterKembali = mysqli_real_escape_string($con, stripslashes($namaShelterKembali));
		$idPeminjam = mysqli_real_escape_string($con, stripslashes($idPeminjam));
		$tipePeminjam = mysqli_real_escape_string($con, stripslashes($tipePeminjam));

		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_pengembalian = date("h:i:s");
		if ($tipePeminjam == "Mahasiswa")
			$query = mysqli_query($con,"UPDATE PEMINJAMAN SET Status = '1', Jam_Kembali = $jam_pengembalian, Lokasi_Kembali = '$namaShelterKembali' WHERE Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$Tahun' AND NPM_Mahasiswa = '$idPeminjam' and Status = '0'");
		else
			$query = mysqli_query($con,"UPDATE PEMINJAMAN SET Status = '1', Jam_Kembali = $jam_pengembalian, Lokasi_Kembali = '$namaShelterKembali' WHERE Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$Tahun' AND ID_Non_Mahasiswa = '$idPeminjam' AND Status = '0'");
		$retval = array('status'=>$query);
	}
	
	function getPeminjaman($idPeminjam,$tipePeminjam)
	{
		global $con;
		
		$idPeminjam = mysqli_real_escape_string($con, stripslashes($idPeminjam));
		$tipePeminjam = mysqli_real_escape_string($con, stripslashes($tipePeminjam));
		
		
		if ($tipePeminjam == "Mahasiswa")
		{
			$dataPeminjam = mysqli_query($con, "SELECT PEMINJAMAN.No_Spekun FROM PEMINJAMAN, MAHASISWA WHERE $idPeminjam = NPM_Mahasiswa and $idPeminjam = MAHASISWA.NPM and status = 0");
			return $dataPeminjam->fetch_array();
		}
		else
		{
			$dataPeminjam = mysqli_query($con, "PEMINJAMAN.No_Spekun FROM PEMINJAMAN, Non_MAHASISWA WHERE $idPeminjam = NPM_Mahasiswa and $idPeminjam = Non_Mahasiswa.ID_Non_Mahasiswa and Peminjaman.ID_Non_Mahasiswa = $idPeminjam and status = 0");
			return $dataPeminjam->fetch_array();
		}
	}
	
	function LaporanRusak($noSpekun, $informasi)
	{
		global $con;
		$noSpekun = mysqli_real_escape_string($con, stripslashes($noSpekun));
		$detail = mysqli_real_escape_string($con, stripslashes($detail));
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_pengembalian = date("h:i:s");
		return array('status' => mysqli_query($con, "INSERT INTO KERUSAKAN_SPEKUN (Detail, Tanggal, Bulan, Tahun, No_Spekun) VALUES ('$detail', '$tanggal', '$bulan', '$tahun', '$noSpekun')"));
	}
	
	function CheckLogin($username,$password) 
	{
		global $con;
  
		$res = mysqli_query($con, "SELECT * FROM PENJAGA_SHELTER WHERE ID_Penjaga = '$username' and Password='$password'");
		$retval;
		if (mysqli_num_rows($res) == 0)
		{
			$retval = array('status'=>'0');
		}
		else{
			$retval = array('status'=>'1');
		}
		return $retval;
	}
	
	function doTukar($idPeminjam, $tipePeminjam, $noSpekunAkhir)
	{
		
		global $con;
		
		$idPeminjam = mysqli_real_escape_string($con, stripslashes($idPeminjam));
		$tipePeminjam = mysqli_real_escape_string($con, stripslashes($tipePeminjam));
		$noSpekunAkhir = mysqli_real_escape_string($con, stripslashes($noSpekunAkhir));
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		
		if ($tipePeminjam == "Mahasiswa")
			$query = mysqli_query($con,"UPDATE PEMINJAMAN SET No_Spekun = $noSpekunAkhir WHERE Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$Tahun' AND NPM_Mahasiswa = '$idPeminjam' and Status = '0'");
		else
			$query = mysqli_query($con,"UPDATE PEMINJAMAN SET No_Spekun = $noSpekunAkhir WHERE Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$Tahun' AND ID_Non_Mahasiswa = '$idPeminjam' AND Status = '0'");
		return array('status'=>$query);
	}


	
	
	//Bagian untuk memanggil method yang sesuai
	
	
	//List available command
	
	$possible_url = array(
        'pinjam',
        'kembali',
		'CheckLogin',
		'laporanRusak',
		'getPeminjaman',
		'tukar'
        );

	function sanitize($input) {
		if ($input == '')
			return '';

		global $con;

		$input = mysqli_real_escape_string($con, $input) or die ('error sanitize ' . $input);

		return $input;
	}
	$value = "";
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {	
		if (isset($_GET['command']) && in_array($_GET['command'], $possible_url)) {			
			$command = sanitize($_GET['command']);
			if ($command == 'pinjam')
			{
				$namaShelterPinjam = sanitize($_GET['idShelter']);
				$noSpekun = sanitize($_GET['noSpekun']);
				$idPeminjam = sanitize($_GET['idPeminjam']);
				$tipePeminjam = sanitize($_GET['tipePeminjam']);
				$namaPeminjam = sanitize($_GET['namaPeminjam']);
				if ($tipePeminjam == "Mahasiswa")
				{
					$fakultasPeminjam = sanitize($_GET['fakultas']);
					InsertNewPeminjam($idPeminjam, $tipePeminjam, $namaPeminjam, $fakultasPeminjam);
				}
				else
				{
					InsertNewPeminjam($idPeminjam, $tipePeminjam, $namaPeminjam,"");
				}
				$value = InsertNewPeminjaman($namaShelterPinjam,$noSpekun,$idPeminjam,$tipePeminjam);
			}

			else if ($command == 'kembali')
			{
				$namaShelterKembali = sanitize($_GET['namaShelterKembali']);
				$idPeminjam = sanitize($_GET['idPeminjam']);
				$tipePeminjam = sanitize($_GET['tipePeminjam']);
				
				$value = DoPengembalian($namaShelterKembali, $idPeminjam, $tipePeminjam);
			}
			else if ($command == 'CheckLogin')
			{
				$username = sanitize($_GET['username']);
				$password = sanitize($_GET['password']);
				$value = CheckLogin($username,$password);
			}
			else if ($command == 'laporanRusak')
			{
				$noSpekun = sanitize($_GET['noSpekun']);
				$detail = sanitize($_GET['detail']);
				
				$value = LaporanRusak($noSpekun, $detail);
			}
			else if ($command == "getPeminjaman")
			{
				$idPeminjam = sanitize($_GET['idPeminjam']);
				$tipePeminjam = sanitize($_GET['tipePeminjam']);
				
				$value = getPeminjaman($idPeminjam,$tipePeminjam);
			}
			else if ($command == 'tukar')
			{
				$noSpekunAwal = sanitize($_GET['noSpekunAwal']);
				$noSpekunAkhir = sanitize($_GET['noSpekunAkhir']);
				$idPeminjam = sanitize($_GET['idPeminjam']);
				$tipePeminjam = sanitize($_GET['tipePeminjam']);
				
				doTukar($idPeminjam, $tipePeminjam, $noSpekunAwal, $noSpekunAkhir);
			}
		}
	}
	
	exit(json_encode($value));
?>
