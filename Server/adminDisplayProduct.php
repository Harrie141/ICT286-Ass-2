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
	<th> WatchID </th>
	<th> Brand </th>
	<th> Model </th>
	<th> Movement </th>
	<th> Colour </th>
	<th> Size </th>
	<th> Price </th>
</tr>

<?php
require_once 'db_conn.php';

$sql = "SELECT * FROM PRODUCTS";
$result = mysqli_query($dbc,$sql);

if (mysqli_num_rows($result) > 0){
 while($row = mysqli_fetch_assoc($result)){
	echo "<table>";	
		echo "<tr>";
		echo  "<td>" . $row['wid'] . "</td>";
		echo "<td>" . $row['brandName'] . "</td>";
		echo "<td>" . $row['modelName'] . "</td>";
		echo "<td>" . $row['movement']. "</td>";
		echo "<td>" . $row['colour'] . "</td>";
		echo "<td>" . $row['size'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
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
