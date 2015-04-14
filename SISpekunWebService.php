<?php
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods : *");
	header("Access-Control-Allow-Headers : Authorization, X-Requested-With, Content-Type, Origin, Accept");
	header("Access-Control-Allow-Credentials : true");
	
	$dbuser = 'root';
	$dbpass = 'sispekunb09';
	$dbname = 'SISpekun';

	$con = mysqli_connect('localhost', $dbuser, $dbpass, $dbname) or die('Terjadi masalah dalam koneksi ke database');
	
	function InsertNewPeminjaman($namaShelterPinjam,$noSpekun,$idPeminjam,$tipePeminjam) {
		global $con;

		$namaShelterPinjam = mysqli_real_escape_string($con, stripslashes($namaShelterPinjam));
		$noSpekun = mysqli_real_escape_string($con, stripslashes($noSpekun));
		$idPeminjam = mysqli_real_escape_string($con, stripslashes($idPeminjam));
		$tipePeminjam = mysqli_real_escape_string($con, stripslashes($tipePeminjam));
		$hari = date("N");
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_Peminjaman = date("h:i:s");
		$retval;
		if ($tipePeminjam == "Mahasiswa")
		{
			$status = mysqli_query($con, "INSERT INTO PEMINJAMAN (Hari, Tanggal, Bulan, Tahun, Jam_Peminjaman, Lokasi_Peminjaman,No_Spekun,NPM_Mahasiswa) values ('$hari','$tanggal', '$bulan', '$tahun', '$jam_Peminjaman', '$namaShelterPinjam','$noSpekun','$idPeminjam')");
			$retval = array('status' => $status);
		}
		else
		{
			$status = mysqli_query($con, "INSERT INTO PEMINJAMAN (Hari, Tanggal, Bulan, Tahun, Jam_Peminjaman, Lokasi_Peminjaman,No_Spekun,ID_Non_Mahasiswa) values ('$hari','$tanggal', '$bulan', '$tahun', '$jam_Peminjaman','$namaShelterPinjam','$noSpekun','$idPeminjam')");
			
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

	function InsertLokasi($username, $idShelter,$noDevice)
	{
		global $con;
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");

		$username = mysqli_real_escape_string($con, stripslashes($username));
		$idShelter = mysqli_real_escape_string($con, stripslashes($idShelter));
		$noDevice = mysqli_real_escape_string($con, stripslashes($noDevice));
		
		$status = mysqli_query($con, "INSERT INTO PENUGASAN_PENJAGA_SHELTER VALUES ('$idShelter','$username','$tanggal','$bulan','$tahun','$noDevice')");
		return array('status'=> $status);
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
	
	function POSTPeminjaman($idPeminjam,$tipePeminjam)
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
			$dataPeminjam = mysqli_query($con, "SELECT PEMINJAMAN.No_Spekun FROM PEMINJAMAN, Non_MAHASISWA WHERE $idPeminjam = NPM_Mahasiswa and $idPeminjam = Non_Mahasiswa.ID_Non_Mahasiswa and Peminjaman.ID_Non_Mahasiswa = $idPeminjam and status = 0");
			return $dataPeminjam->fetch_array();
		}
	}
	
	function LaporanRusak($noSpekun, $informasi)
	{
		global $con;
		$noSpekun = mysqli_real_escape_string($con, stripslashes($noSpekun));
		$detail = mysqli_real_escape_string($con, stripslashes($detail));
		$hari = date("N");
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_pengembalian = date("h:i:s");
		return array('status' => mysqli_query($con, "INSERT INTO KERUSAKAN_SPEKUN (Detail, Hari, Tanggal, Bulan, Tahun, No_Spekun) VALUES ('$detail', '$hari', '$tanggal', '$bulan', '$tahun', '$noSpekun')"));
	}
	
	function getPeminjaman($idPeminjam,$tipePeminjam)
	{
		global $con;
		$idPeminjam = mysqli_real_escape_string($con, stripslashes($idPeminjam));
		// $tipePeminjam = mysqli_real_escape_string($con, stripslashes($tipePeminjam));
		//echo $idPeminjam;
		// $tanggal = date("d");
		// $bulan = date("m");
		// $tahun = date("Y");
		//die("haha ".$idPeminjam);
		$res;
		if ($tipePeminjam == "Mahasiswa")
		{
			$res = mysqli_query($con, "SELECT * FROM `PENJAGA_SHELTER`");
			//$query = mysqli_query($con, "SELECT MAHASISWA.Nama as NamaPeminjam, MAHASISWA.NPM as Identitas, PEMINJAMAN.No_Spekun FROM MAHASISWA,PEMINJAMAN WHERE MAHASISWA.NPM = PEMINJAMAN.NPM_Mahasiswa AND (Status = NULL OR Status = 0) AND MAHASISWA.NPM=$idPeminjam");
			//AND PEMINJAMAN.Tanggal = $tanggal AND PEMINJAMAN.Bulan = $bulan AND PEMINJAMAN.Tahun = $tahun
			// while($row = mysqli_fetch_assoc($result))
				// $test[] = $row;
			// return json_encode($test);
			// $dataPeminjam = mysqli_query($con, "SELECT PEMINJAMAN.No_Spekun FROM PEMINJAMAN, MAHASISWA WHERE '$idPeminjam' = NPM_Mahasiswa and '$idPeminjam' = MAHASISWA.NPM and status = 0");
			// return $dataPeminjam->fetch_array();
		}
		else
		{
			$res = mysqli_query($con, "SELECT * FROM `PENJAGA_SHELTER`");
			//$query = mysqli_query($con, "SELECT NON_MAHASISWA.Nama as NamaPeminjam, NON_MAHASISWA.No_KTP as Identitas, PEMINJAMAN.No_Spekun, NON_MAHASISWA.PEKERJAAN as Pekerjaan FROM NON_MAHASISWA,PEMINJAMAN WHERE NON_MAHASISWA.NPM = PEMINJAMAN.NPM_Mahasiswa AND (Status = NULL or Status = 0) AND NON_MAHASISWA.No_KTP=$idPeminjam");
			// while($row = mysqli_fetch_assoc($result))
				// $test[] = $row;
			// return json_encode($test);
			// $dataPeminjam = mysqli_query($con, "SELECT PEMINJAMAN.No_Spekun FROM PEMINJAMAN, MAHASISWA WHERE '$idPeminjam' = NPM_Mahasiswa and '$idPeminjam' = MAHASISWA.NPM and status = 0");
			// return $dataPeminjam->fetch_array();
		}
		
		if($res == false) {
			//return mysqli_error($res);
			return "FUCK";
		}
		else {
			//return $res;
			$rows = array();
			while($row = mysql_fetch_assoc($res)) {
				$rows[] = $r;
			}
			return $rows;
		}
	}
	
	
	function CheckLogin($username,$password) 
	{
		global $con;
  
		$res = mysqli_query($con, "SELECT * FROM PENJAGA_SHELTER WHERE Username = '$username' and Password='$password'");
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
		'POSTPeminjaman',
		'tukar',
		'insertLokasi',
		'getPeminjaman'
        );

	function sanitize($input) {
		if ($input == '')
			return '';

		global $con;

		$input = mysqli_real_escape_string($con, $input) or die ('error sanitize ' . $input);

		return $input;
	}
	$value = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
		if (isset($_POST['command']) && in_array($_POST['command'], $possible_url)) {			
			$command = sanitize($_POST['command']);
			if ($command == 'pinjam')
			{
				$namaShelterPinjam = sanitize($_POST['idShelter']);
				$noSpekun = sanitize($_POST['noSpekun']);
				$idPeminjam = sanitize($_POST['idPeminjam']);
				$tipePeminjam = sanitize($_POST['tipePeminjam']);
				$namaPeminjam = sanitize($_POST['namaPeminjam']);
				if ($tipePeminjam == "Mahasiswa")
				{
					$fakultasPeminjam = sanitize($_POST['fakultas']);
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
				$namaShelterKembali = sanitize($_POST['namaShelterKembali']);
				$idPeminjam = sanitize($_POST['idPeminjam']);
				$tipePeminjam = sanitize($_POST['tipePeminjam']);
				
				$value = DoPengembalian($namaShelterKembali, $idPeminjam, $tipePeminjam);
			}
			else if ($command == 'CheckLogin')
			{
				$username = sanitize($_POST['username']);
				$password = sanitize($_POST['password']);
				$value = CheckLogin($username,$password);
			}
			else if ($command == 'laporanRusak')
			{
				$noSpekun = sanitize($_POST['noSpekun']);
				$detail = sanitize($_POST['detail']);
				
				$value = LaporanRusak($noSpekun, $detail);
			}
			else if ($command == "POSTPeminjaman")
			{
				$idPeminjam = sanitize($_POST['idPeminjam']);
				$tipePeminjam = sanitize($_POST['tipePeminjam']);
				
				$value = POSTPeminjaman($idPeminjam,$tipePeminjam);
			}
			else if ($command == 'tukar')
			{
				$noSpekunAwal = sanitize($_POST['noSpekunAwal']);
				$noSpekunAkhir = sanitize($_POST['noSpekunAkhir']);
				$idPeminjam = sanitize($_POST['idPeminjam']);
				$tipePeminjam = sanitize($_POST['tipePeminjam']);
				
				$value = doTukar($idPeminjam, $tipePeminjam, $noSpekunAwal, $noSpekunAkhir);
			}
			else if ($command == 'insertLokasi')
			{
				$usernamePenjaga = sanitize($_POST['username']);
				$idShelterBertugas = sanitize($_POST['idShelter']);
				$noDevice = sanitize($_POST['noDevice']);
				$value = InsertLokasi($usernamePenjaga,$idShelterBertugas,$noDevice);
			}
			else if ($command == 'getPeminjaman')
			{
				$idPeminjam = sanitize($_POST['idPeminjam']);
				$tipePeminjam = sanitize($_POST['tipePeminjam']);
				$value = getPeminjaman($idPeminjam,$tipePeminjam);
			}
		}
	}
	
	exit(json_encode($value));
?>
