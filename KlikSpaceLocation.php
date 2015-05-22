<?php
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods : *");
	header("Access-Control-Allow-Headers : Authorization, X-Requested-With, Content-Type, Origin, Accept");
	header("Access-Control-Allow-Credentials : true");
	
	$dbuser = 'root';
	$dbpass = 'sispekunb09';
	$dbname = 'klikspace';

	$con = mysqli_connect('localhost', $dbuser, $dbpass, $dbname) or die('Terjadi masalah dalam koneksi ke database');
	
	function convertToAngka($value)
	{
		if ($value)
			return '1';
		return '0';
	}
	//FIXED
	function getLocationFromId($id) 
	{
		global $con;
		//die('haha');
  		//die("SELECT * FROM User WHERE user_field = '$username' and password_field='$password'");
		$res = mysqli_query($con, "SELECT * FROM Location WHERE CityId == '$id'");

		$retval;

		if (mysqli_num_rows($res) == 0)
		{
			$retval = array('status'=>'ERR', 'msg'=>'Invalid username or password.');
		}
		else
		{
			$retval = array_merge(array("status"=>"OK", "msg" => "Login Success.", "key" => $sessionKey),mysqli_fetch_assoc($res));
		}
		return $retval;
	}
	
	//Bagian untuk memanggil method yang sesuai
	

	function sanitize($input) {
		if ($input == '')
			return '';

		global $con;

		$input = mysqli_real_escape_string($con, $input) or die ('error sanitize ' . $input);

		return $input;
	}
	$value = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
		$id = sanitize($_POST['Id']);
		$value = getLocationFromId($id);
		
	}
	
	exit(json_encode($value));
?>
