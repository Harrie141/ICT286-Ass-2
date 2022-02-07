<?php
include 'db_conn.php';
		$name = $_POST["ADCname"];
		$email = $_POST["ADCemail"];
		$usr = $_POST["ADCusr"];
		$pwd = $_POST["ADCpwd"];
		$type = $_POST["acc_type"];

	$sqlq = "SELECT * FROM USERS WHERE usr_usrname ='$usr'";
	$sqlr = mysqli_query($dbc,$sqlq);

if (mysqli_num_rows($sqlr) > 0){
		echo "User already exists. Contact IT support desk or try again";
	}else{
	$sql = "INSERT INTO USERS (usr_name, usr_email, usr_usrname, usr_pwd, usr_type) VALUES ('$name','$email','$usr','$pwd','$type')";
	$result = mysqli_query($dbc, $sql);
}

?>
