<?php
$q = $_GET['q'];
$host= "localhost";
$user= "X33974343";
$password= "X33974343";
$dbname= "X33974343";

$dbc = mysqli_connect($host, $user, $password, $dbname);
if(!$dbc){
    die("Can't Connect" . mysqli_error($dbc));
    
}
$sql = "SELECT price FROM PRODUCTS WHERE modelName LIKE '$q'";
$result = mysqli_query($dbc, $sql);
 if(mysqli_num_rows($result)>0){
     while ($row= mysqli_fetch_array($result)){
         echo $row['price'];
     }
 }
 mysqli_close($dbc);
?>