<?php
include 'db_conn.php';

function signupInputEmpty($name, $email, $usr, $pwd){
	$result;
	if(empty($name) || empty($email) || empty($usr) || empty($pwd)){
		$result = true;
}else{
	$result = false;
}return $result;
}

function invalidUsr($usr){
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/", $usr)){
		$result = true;
}else{
	$result = false;
}return $result;
}

function invalidEmail($email){
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$result = true;
}else{
	$result = false;
}return $result;
}

function usrExists($dbc, $usr, $email){
	$sql= "SELECT * FROM USERS WHERE usr_usrname = ? OR usr_email = ?;";
	$stmt= mysqli_stmt_init($dbc);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signup.php?error=stmtFailure");
		exit();
	}
		mysqli_stmt_param($stmt,"ss",$usr,$email);
		mysqli_stmt_execute($stmt);

	$resultStmt = mysqli_stmt_result($stmt);
	
	if ($row = mysqli_fetch_assoc($resultStmt)){
	return $row;	
}else{
	$result = false;
	return $result;
}
	mysqli_stmt_close($stmt);
}
function createUsr($dbc, $name, $email, $usr, $pwd){
	$sql = "INSERT INTO USERS (usr_name, usr_email, usr_usrname, usr_pwd) VALUES (?,?,?,?)";
	$stmt = mysqli_stmt_init($dbc);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: signup.php?error=stmtFailure");
		exit();
	}
		mysqli_stmt_param($stmt,"ssss", $name, $email, $usr, $pwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	
	header("location: signup.php?error=none");
	exit();
}

function loginInputEmpty($usr, $pwd){
	$result;
	if(empty($usr) || empty($pwd)){
		$result = true;
}else{
	$result = false;
}return $result;
}
function loginUser($dbc, $usr, $pwd){
	$userExists = usrExists($dbc, $usr);
	if($userExists === false){
		header("location: login.php?error=loginerror");
		exit();
	}
	$pass = $uidExists["usr_pwd"];
	$pwdVerify = pwd_verify($pwd,$pass);
	if($pwdVerify === false){
		header("location: login.php?error=loginerror");
		exit();	
}else if ($pwdVerify === true){
	session_start();
	$_SESSION["s_uid"] = $uidExists["uid"];
	header("location: index.php");
		exit();
}
}

function listUsers(){
	$q = "SELECT uid FROM USERS WHERE usr_type= 'user'";
	$query= mysqli_query($dbc, $q);
	$rows= mysqli_num_rows($query);
	echo ' <h1> ' .$row. '</h1>';
}


?>