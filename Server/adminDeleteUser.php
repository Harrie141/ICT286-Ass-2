<?php
include 'db_conn.php';

		$usr = $_POST["ADDusr"];
		$pwd = $_POST["ADDpwd"];

	$sqlq = "SELECT * FROM USERS WHERE usr_usrname ='$usr'";
	$sqlr = mysqli_query($dbc,$sqlq);

if (mysqli_num_rows($sqlr) < 0){
		echo "User does not exist. Contact IT support desk or try again";
	}else{
	$sql = "DELETE FROM USERS WHERE usr_usrname= '$usr' AND usr_pwd= '$pwd'";
	$result = mysqli_query($dbc, $sql);
	echo "User was deleted successfully";
}	
?>
