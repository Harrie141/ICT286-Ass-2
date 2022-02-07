<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
    <link rel = "stylesheet" type="text/css" href = "../CSS/mainpage.css">
<style>
table{
	width: 70%;
	border: 1px ridge black;
	border-collapse: collapse;
	border-spacing: 1px;
	font-size: 20px;

}
</style>
</head>
<body>
<table>
<tr>
	<th> UserID </th>
	<th> Name </th>
	<th> Email </th>
	<th> Username </th>
	<th> Password </th>
	<th> Account Type </th>
</tr>

<?php
require_once 'db_conn.php';

$sql = "SELECT * FROM USERS";
$result = mysqli_query($dbc,$sql);

if (mysqli_num_rows($result) > 0){
 while($row = mysqli_fetch_assoc($result)){
	echo "<table>";	
		echo "<tr>";
		echo  "<td>" . $row['uid'] . "</td>";
		echo "<td>" . $row['usr_name'] . "</td>";
		echo "<td>" . $row['usr_email'] . "</td>";
		echo "<td>" . $row['usr_usrname']. "</td>";
		echo "<td>" . $row['usr_pwd'] . "</td>";
		echo "<td>" . $row['usr_type'] . "</td>";
		echo "</tr>";
		
		echo "</table>";
}
}else {
	echo "Could not find users on selected database. Please contact IT Administrator";
}
mysqli_close($dbc);
?>

</table>
</body>
</html>
