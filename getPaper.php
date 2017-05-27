<?php 

$servername = "localhost";
$username = "root";
$password = "";

//connection creation

$conn = mysqli_connect($servername,$username,$password);

if(!$conn){

	die("Connection failed :" . mysqli_connect_error());
}



 mysqli_select_db($conn,"webpro") or die("Could not select webpro");

 $result =mysqli_query($conn,"SELECT * FROM papers");

//  $cid=$result['cid'];
// $confName=$result['confName'];
// $deadline=$result['deadline'];
 
echo "<select name='papers'>";
while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
   
echo '<option value='; 
echo  "".$row[0]."";
echo '>'; 
echo  ""  .$row[0]. ' </option>';

}
echo "</select>";

echo "<br>";
echo "<br>";
echo "<br>";





 ?>