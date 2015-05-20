<?php
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods : *");
	header("Access-Control-Allow-Headers : Authorization, X-Requested-With, Content-Type, Origin, Accept");
	header("Access-Control-Allow-Credentials : true");
	
	$dbuser = 'root';
	$dbpass = 'sispekunb09';
	$dbname = 'SISpekun';

	$con = mysqli_connect('localhost', $dbuser, $dbpass, $dbname) or die('Terjadi masalah dalam koneksi ke database');
	
	function convertToAngka($value)
	{
		if ($value)
			return '1';
		return '0';
	}
	//FIXED
	// return -11 jika sepeda sudah dipinjam
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
		$querySepeda = mysqli_query($con, "SELECT * FROM PEMINJAMAN WHERE No_Spekun = $noSpekun AND (Status = 0 OR Status is NULL)");
		if (mysqli_num_rows($querySepeda) != 0) {
			return array('status' => '-11');
		}
		if ($tipePeminjam == "Mahasiswa")
		{
			$query = mysqli_query($con,"SELECT * FROM PEMINJAMAN WHERE Tanggal = $tanggal AND Bulan = $bulan and Tahun = $tahun and (Status = 0 OR Status is NULL) and NPM_Mahasiswa = '$idPeminjam'"); 
			if (mysqli_num_rows($query) != 0)
			{
				return array('status' => "-12");
			}
			
			$status = mysqli_query($con, "INSERT INTO PEMINJAMAN (Hari, Tanggal, Bulan, Tahun, Jam_Peminjaman, Lokasi_Peminjaman,No_Spekun,NPM_Mahasiswa) values ('$hari','$tanggal', '$bulan', '$tahun', '$jam_Peminjaman', '$namaShelterPinjam','$noSpekun','$idPeminjam')");
			$retval = array('status' => convertToAngka($status));
		}
		else
		{
			$query = mysqli_query($con,"SELECT * FROM PEMINJAMAN WHERE Tanggal = $tanggal AND Bulan = $bulan and Tahun = $tahun and (Status = 0 OR Status is NULL) and ID_Non_Mahasiswa = '$idPeminjam'"); 
			if (mysqli_num_rows($query) != 0)
			{
				return array('status' => "-12");
			}
			
			$status = mysqli_query($con, "INSERT INTO PEMINJAMAN (Hari, Tanggal, Bulan, Tahun, Jam_Peminjaman, Lokasi_Peminjaman,No_Spekun,ID_Non_Mahasiswa) values ('$hari','$tanggal', '$bulan', '$tahun', '$jam_Peminjaman','$namaShelterPinjam','$noSpekun','$idPeminjam')");
			
			$retval = array('status' => convertToAngka($status));
		}
		return $retval;
	}
	
	//FIXED
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
			$retval = array('status'=> convertToAngka($status));
		}
		else
		{
			$status = mysqli_query($con, "INSERT INTO NON_MAHASISWA (Nama, No_KTP, Pekerjaan) VALUES ('$namaPeminjam','$idPeminjam','$tipePeminjam')");
			$retval = array('status'=> convertToAngka($status));
		}
		
		return $retval;
	}

	//FIXED
	function InsertLokasi($username, $idShelter, $noDevice)
	{
		global $con;
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");

		$username = mysqli_real_escape_string($con, stripslashes($username));
		$idShelter = mysqli_real_escape_string($con, stripslashes($idShelter));
		$noDevice = mysqli_real_escape_string($con, stripslashes($noDevice));
		$checkLokasi = mysqli_query($con, "SELECT * FROM PENUGASAN_PENJAGA_SHELTER WHERE Tanggal = $tanggal AND Bulan = $bulan AND Tahun = $tahun AND ID_Penjaga = '$username'");
		if (mysqli_num_rows($checkLokasi)== 0)
		{
			$checkLokasi2 = mysqli_query($con, "SELECT * FROM PENUGASAN_PENJAGA_SHELTER WHERE Tanggal = $tanggal AND Bulan = $bulan AND Tahun = $tahun AND ID_Shelter = '$idShelter'");
			if (mysqli_num_rows($checkLokasi2) == 0)
			{
				$status = mysqli_query($con, "INSERT INTO PENUGASAN_PENJAGA_SHELTER VALUES ('$idShelter','$username','$tanggal','$bulan','$tahun','$noDevice')");
				return array('status'=> convertToAngka($status));
			}
			else
			{
				return array('status'=> '-11');
			}
		}
		else
		{
			return array('status'=> '-12');
		}
	}
	
	//FIXED
	function DoPengembalian($namaShelterKembali, $idPeminjam, $tipePeminjam)
	{
		global $con;
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_pengembalian = date("h:i:s");
		if ($tipePeminjam == "Mahasiswa") {
			$query = "UPDATE PEMINJAMAN SET Status = 1, Jam_Kembali = '$jam_pengembalian', Lokasi_Kembali = '$namaShelterKembali' WHERE Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$tahun' AND NPM_Mahasiswa = '$idPeminjam' AND Status = 0";
			if(mysqli_query($con, $query)) {
				return array('status'=>'1');
			}
			else {
				return array('status'=>'0');
			}
		}
		else {
			$query = "UPDATE PEMINJAMAN SET Status = 1, Jam_Kembali = '$jam_pengembalian', Lokasi_Kembali = '$namaShelterKembali' WHERE Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$tahun' AND ID_Non_Mahasiswa = '$idPeminjam' AND Status = 0";
			if(mysqli_query($con, $query)) {
				return array('status'=>'1');
			}
			else {
				return array('status'=>'0');
			}
		}
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
	
	//FIXED
	function LaporanRusak($noSpekun, $informasi)
	{
		global $con;
		
		$hari = date("N");
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_pengembalian = date("h:i:s");
		$noSpekun = str_pad($noSpekun, 4, '0', STR_PAD_LEFT);
		return array('status' => convertToAngka(mysqli_query($con, "INSERT INTO KERUSAKAN_SPEKUN (Detail, Hari, Tanggal, Bulan, Tahun, No_Spekun) VALUES ('$informasi', '$hari', '$tanggal', '$bulan', '$tahun', '$noSpekun')")));
	}
	
	//FIXED
	function getPeminjaman($idPeminjam,$tipePeminjam)
	{
		global $con;
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$res;
		if ($tipePeminjam == "Mahasiswa")
		{
			$res = mysqli_query($con, "SELECT MAHASISWA.Nama as NamaPeminjam, MAHASISWA.NPM as Identitas, PEMINJAMAN.No_Spekun FROM MAHASISWA,PEMINJAMAN WHERE MAHASISWA.NPM = PEMINJAMAN.NPM_Mahasiswa AND (PEMINJAMAN.Status = NULL OR PEMINJAMAN.Status = 0) AND MAHASISWA.NPM = '$idPeminjam' AND PEMINJAMAN.Tanggal = '$tanggal' AND PEMINJAMAN.Bulan = '$bulan' AND PEMINJAMAN.Tahun = '$tahun'");
		}
		else
		{
			$res = mysqli_query($con, "SELECT NON_MAHASISWA.Nama as NamaPeminjam, NON_MAHASISWA.No_KTP as Identitas, PEMINJAMAN.No_Spekun, NON_MAHASISWA.PEKERJAAN as Pekerjaan FROM NON_MAHASISWA,PEMINJAMAN WHERE NON_MAHASISWA.No_KTP = PEMINJAMAN.ID_Non_Mahasiswa AND (PEMINJAMAN.Status = NULL or PEMINJAMAN.Status = 0) AND NON_MAHASISWA.No_KTP = '$idPeminjam' AND PEMINJAMAN.Tanggal = '$tanggal' AND PEMINJAMAN.Bulan = '$bulan' AND PEMINJAMAN.Tahun = '$tahun'");
		}
		
		if($res == false) {
			return mysqli_error($res);
		}
		else {
			$rows = array();
			while($row = mysqli_fetch_assoc($res)) {
				$rows[] = $row;
			}
			return $rows;
		}
	}
	
	function getRequest($latestRequestId)
	{
		global $con;
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$res = mysqli_query($con, "SELECT ID, Shelter_Peminta, Jumlah_Request from REQUEST_SEPEDA where ID > $latestRequestId AND Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$tahun'");
		
		if($res == false) {
			return mysqli_error($res);
		}
		else {
			$rows = array();
			while($row = mysqli_fetch_assoc($res)) {
				$rows[] = $row;
			}
			return $rows;
		}
	}

	function addRequest($idShelterPeminta, $jumlahRequest)
	{
		global $con;
		
		$hari = date("N");
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$res;
		$res = mysqli_query($con, "INSERT INTO REQUEST_SEPEDA (Shelter_Peminta, Jumlah_Request, Tanggal, Bulan, Tahun, Hari) VALUES ('$idShelterPeminta',$jumlahRequest, '$tanggal','$bulan','$tahun','$hari')");
		
		return array('status'=> convertToAngka($res));
	}
	//FIXED
	function CheckLogin($username,$password) 
	{
		global $con;
  
		$res = mysqli_query($con, "SELECT * FROM PENJAGA_SHELTER WHERE Username = '$username' and Password='$password'");
		$retval;
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		
		if (mysqli_num_rows($res) == 0)
		{
			$retval = array('status'=>'0');
		}
		else
		{
			$checkLokasi = mysqli_query($con, "SELECT * FROM PENUGASAN_PENJAGA_SHELTER WHERE Tanggal = $tanggal AND Bulan = $bulan AND Tahun = $tahun AND ID_Penjaga = '$username'");
			if (mysqli_num_rows($checkLokasi)!= 0)
			{
				return array('status'=>'-12','Lokasi'=>mysqli_fetch_row($checkLokasi)[0]);
			}
			else
			{
				$retval = array('status'=>'1');
			}
		}
		return $retval;
	}
	
	function doTukar($idPeminjam, $tipePeminjam, $noSpekunAkhir)
	{
		global $con;
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		if ($tipePeminjam == "Mahasiswa") {
			$query = "UPDATE PEMINJAMAN SET No_Spekun = $noSpekunAkhir WHERE Tanggal = $tanggal AND Bulan = $bulan AND Tahun = $tahun AND NPM_Mahasiswa = '$idPeminjam' and Status = 0";
			if(mysqli_query($con, $query)) {
				return array('status'=>'1');
			}
			else {
				return array('status'=>'0');
			}
		}
		else {
			$query = "UPDATE PEMINJAMAN SET No_Spekun = $noSpekunAkhir WHERE Tanggal = $tanggal AND Bulan = $bulan AND Tahun = $tahun AND ID_Non_Mahasiswa = '$idPeminjam' AND Status = 0";
			if(mysqli_query($con, $query)) {
				return array('status'=>'1');
			}
			else {
				return array('status'=>'0');
			}
		}
	}

	function checkSpekunBelumKembali()
	{
		global $con;
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		
		$res = mysqli_query($con, "SELECT P.Hari, P.Tanggal, P.Bulan, P.Tahun, P.Jam_Peminjaman, P.Lokasi_Peminjaman, P.No_Spekun, P.NPM_Mahasiswa, P.ID_Non_Mahasiswa from PEMINJAMAN P where (Status = 0 OR Status is NULL)");
		
		if($res == false) {
			return array('status'=>'0', 'result'=>'[]');
		}
		else {
			$rows = array();
			while($row = mysqli_fetch_assoc($res)) {
				$rows[] = $row;
			}
			return array('status'=>'1', 'result'=>$rows);
		}
	}
	
	function ubahStatusAkhirHari($noSpekun)
	{
		global $con;
		
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_pengembalian = date("h:i:s");
		
		$query = "UPDATE PEMINJAMAN SET Status = 1, Jam_Kembali = '$jam_pengembalian' WHERE Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$tahun' AND No_Spekun = '$noSpekun' AND Status = 0";
		if(mysqli_query($con, $query)) {
			return array('status'=>'1');
		}
		else {
			return array('status'=>'0');
		}
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
		'getPeminjaman',
		'getRequestSepeda',
		'requestSepeda',
		'akhirHari',
		'ubahSpekunBelumKembali'
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
				
				$value = doTukar($idPeminjam, $tipePeminjam, $noSpekunAkhir);
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
			else if ($command == 'getRequestSepeda')
			{
				$lastRequestId = sanitize($_POST['idRequest']);
				$value = getRequest($lastRequestId);
			}
			else if($command == 'requestSepeda')
			{
				$idShelterPeminta = sanitize($_POST['idShelter']);
				$jumlahRequest = sanitize($_POST['jumlah']);
				$value = addRequest($idShelterPeminta, $jumlahRequest);
			}
			else if ($command == 'akhirHari')
			{
				$value = checkSpekunBelumKembali();
			}
			else if($command == 'ubahSpekunBelumKembali')
			{
				$no_spekun = sanitize($_POST['no_spekun']);
				$value = ubahStatusAkhirHari($no_spekun);
			}
		}
	}
	
	exit(json_encode($value));
?>
