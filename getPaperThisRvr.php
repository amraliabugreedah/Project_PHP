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

 session_start(); 
        $userID = $_SESSION["thisUserID"];

 $result =mysqli_query($conn,"SELECT * FROM review where rvrID=$userID");

//  $cid=$result['cid'];
// $confName=$result['confName'];
// $deadline=$result['deadline'];
 
echo "<select name='paper'>";
while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
   
echo '<option value='; 
echo  "".$row[2]."";
echo '>'; 
echo  ""  .$row[2]. ' </option>';

}
echo "</select>";

echo "<br>";
echo "<br>";
echo "<br>";





 ?>