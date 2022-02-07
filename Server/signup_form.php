<?php

require_once 'db_conn.php';
require_once 'functions.php';

		$name = $_POST["name"];
		$email = $_POST["email"];
		$usr = $_POST["usr"];
		$pwd = $_POST["pwd"];

	$sql_usr = "SELECT * FROM USERS WHERE usr_usrname ='$usr'";
	$sql_usrchck = mysqli_query($dbc,$sql_usr);

	if (mysqli_num_rows($sql_usrchck) > 0){
		header("location: signup.php?error=userExists");
	}else{
	$sql = "INSERT INTO USERS (usr_name, usr_email, usr_usrname, usr_pwd, usr_type) VALUES ('$name','$email','$usr','$pwd','user')";
	$result = mysqli_query($dbc, $sql);
}

	if(signupInputEmpty($name, $email, $usr, $pwd) !== false){
		header("location: signup.php?error=emptyInput");
		exit();
}
	if(invalidUsr($usr) !== false){
		header("location: signup.php?error=invalidUser");
		exit();
}
	if(invalidEmail($email) !== false){
		header("location: signup.php?error=invalidEmail");
		exit();
}
	if(usrExists($dbc, $usr) !== false){
		header("location: signup.php?error=userExists");
		exit();
}

?>