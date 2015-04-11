<?php
	phpinfo();
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
		$tanggal = date("d");
		$bulan = date("m");
		$tahun = date("Y");
		$jam_Peminjaman = date("h:i:s");
		
		if ($tipePeminjam == "Mahasiswa")
		{
			return mysqli_query($con, "INSERT INTO PEMINJAMAN (Tanggal, Bulan, Tahun, Jam_Peminjaman, Lokasi_Peminjaman,No_Spekun,NPM_Mahasiswa) values ('$tanggal', '$bulan', '$tahun', '$jam_Peminjaman', '$namaShelterPinjam','$noSpekun','$idPeminjam')") or die('Terjadi masalah dalam proses peminjaman. Silakan coba lagi');
		}
		else
		{
			return mysqli_query($con, "INSERT INTO PEMINJAMAN (Tanggal, Bulan, Tahun, Jam_Peminjaman, Lokasi_Peminjaman,No_Spekun,ID_Non_Mahasiswa) values ('$tanggal', '$bulan', '$tahun', '$jam_Peminjaman','$namaShelterPinjam','$noSpekun','$idPeminjam')") or die('Terjadi masalah dalam proses peminjaman. Silakan coba lagi');
		}
	}
	
	function InsertNewPeminjam($idPeminjam, $tipePeminjam, $namaPeminjam, $fakultasPeminjam)
	{
		global $con;

		$namaPeminjam = mysqli_real_escape_string($con, stripslashes($namaPeminjam));
		$fakultasPeminjam = mysqli_real_escape_string($con, stripslashes($fakultasPeminjam));
		$idPeminjam = mysqli_real_escape_string($con, stripslashes($idPeminjam));
		$tipePeminjam = mysqli_real_escape_string($con, stripslashes($tipePeminjam));
		echo $tipePeminjam."<br>";
		if ($tipePeminjam == "Mahasiswa")
		{
			mysqli_query($con, "INSERT INTO MAHASISWA VALUES ('$namaPeminjam','$idPeminjam','$fakultasPeminjam')");
			return "Berhasil";
		}
		else
		{
			echo $tipePeminjam."<br>";
			mysqli_query($con, "INSERT INTO NON_MAHASISWA (Nama, No_KTP, Pekerjaan) VALUES ('$namaPeminjam','$idPeminjam','$tipePeminjam')");
			return "Berhasil";
		}
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
		
		$query = "UPDATE PEMINJAMAN SET Status = '1', Jam_Kembali = $jam_pengembalian, Lokasi_Kembali = '$namaShelterKembali' WHERE Tanggal = '$tanggal' AND Bulan = '$bulan' AND Tahun = '$Tahun' AND NPM_Mahasiswa = '$idPeminjam' ";
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
		return mysqli_query($con, "INSERT INTO KERUSAKAN_SPEKUN (Detail, Tanggal, Bulan, Tahun, No_Spekun) VALUES ('$detail', '$tanggal', '$bulan', '$tahun', '$noSpekun')");
	}
	
	function CheckLogin($username,$password) 
	{
		global $con;
  
		$res = mysqli_query($con, "SELECT * FROM PENJAGA_SHELTER WHERE ID_Penjaga = '$username' and Password='$password'");
		if (mysqli_num_rows($res) == 0)
		{
			return "Gagal Login";
		}
		else{
			return "Sukses Login";
		}
	}


	
	
	//Bagian untuk memanggil method yang sesuai
	
	
	//List available command
	
	$possible_url = array(
        'pinjam',
        'kembali',
		'CheckLogin',
		'laporanRusak'
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
				$namaShelterPinjam = sanitize($_POST['namaShelter']);
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
				$namaShelterKembali = sanitize($_POST['namaPeminjam']);
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
				echo $detail;
				
				$value = LaporanRusak($noSpekun, $detail);
				echo $value;
			}
		}
	}
	
	exit(json_encode($value));
?>
