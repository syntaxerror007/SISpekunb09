<?php
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods : *");
	header("Access-Control-Allow-Headers : Authorization, X-Requested-With, Content-Type, Origin, Accept");
	header("Access-Control-Allow-Credentials : true");
	
	$dbuser = 'root';
	$dbpass = 'sispekunb09';
	$dbname = 'klikspace';

	$con = mysqli_connect('localhost', $dbuser, $dbpass, $dbname) or die('Terjadi masalah dalam koneksi ke database');
	
	//FIXED
	function GetAllCity($username,$password) 
	{
		global $con;
		//die('haha');
  		//die("SELECT * FROM User WHERE user_field = '$username' and password_field='$password'");
		$res = mysqli_query($con, "SELECT * FROM Cities");

		$retval;
		$rows = array();
		while($row = mysqli_fetch_assoc($res)) {
			$rows[] = $row;
		}
		return $rows;
	}
	
	//Bagian untuk memanggil method yang sesuai
	
	
	$value = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
		$value = GetAllCity();
		
	}
	
	exit(json_encode($value));
?>
