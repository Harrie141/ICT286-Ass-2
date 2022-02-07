<?php
	$q=$_GET['q'];

	$host= "localhost";
	$user= "X33974343";
	$password= "X33974343";
	$dbname= "X33974343";

	$dbc = mysqli_connect($host, $user, $password, $dbname);
    if(!$dbc){
		die("Can't Connect" . mysqli_error($dbc));
		
	}

    $sql="SELECT * FROM PRODUCTS WHERE colour LIKE '$q' OR movement LIKE '$q' OR brandName LIKE '$q' OR modelName LIKE '$q' or size LIKE '$q'";

    $result = mysqli_query($dbc,$sql);
	
	
    echo "<table>
	<tr>
		<th>ID</th>
		<th>Brand Name</th>
		<th>Model Name</th>
		<th>Movement</th>
		<th>Colour</th>
		<th>Size</th>
		<th> Price</th>
	</tr>";
    while($row= mysqli_fetch_array($result)) {
		echo "<tr>";
		echo  "<td>" . $row['wid'] . "</td>";
		echo "<td>" . $row['brandName'] . "</td>";
		echo "<td>" . $row['modelName']. "</td>";
		echo "<td>" . $row['movement'] . "</td>";
		echo "<td>" . $row['colour'] . "</td>";
		echo "<td>" . $row['size'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "</tr>";
		}
		echo "<table>";
		mysqli_close($dbc);
	
?>