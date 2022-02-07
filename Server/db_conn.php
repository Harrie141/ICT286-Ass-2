<?php
	$host= "localhost";
	$user= "X33974343";
	$password= "X33974343";
	$dbname= "X33974343";

	$dbc = mysqli_connect($host, $user, $password, $dbname);
	

	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: "
		.mysqli_connect_error()
		."<br/>Error number:"
		.mysql_connect_errno();
	}
?>

