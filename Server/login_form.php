<?php

require_once 'db_conn.php';
		$usr = $_POST["usr"];
		$uid = $row["uid"];
		$pwd = $_POST["pwd"];
session_start();
$sql="SELECT * FROM USERS WHERE usr_usrname='$usr' AND usr_pwd='$pwd'";

	$userExists = mysqli_query($dbc, $sql);
	$fetchRow= mysqli_fetch_array($userExists);

	if($fetchRow["usr_type"] == "user"){
			$_SESSION["sid"] =$usr;
			header("location: ../WebClient/main.html?UserLoginSuccess");
	    }elseif($fetchRow["usr_type"] == "staff"){
			$_SESSION["sid"] =$usr;
			header("location: ../WebClient/admin.html");
		}else{
		    	echo"<script> alert('Error: Invalid login entry. Please try again.');</script>";
			header("location: login.html");
		}
		exit();
?>