<?php 
$servername = "localhost";
$username = "root";
$password = "";

//connection creation

$conn = mysqli_connect($servername,$username,$password);

if(!$conn){

	die("Connection failed :" . mysqli_connect_error());
}
echo "Connected";
echo "<br>";
echo "<br>";

 mysqli_select_db($conn,"webpro") or die("Could not select webpro");


if($_POST["Rate"]==""||$_POST["Comment"]==""||!isset($_POST["paper"])){
	echo "Missing fields";
	exit;
}
     
 session_start(); 
     $userID = $_SESSION["thisUserID"];
$paper=$_POST['paper'];
$Rate =$_POST['Rate'];
$Comment =$_POST['Comment'];

if($Rate >10 || $Rate <1 ){
	echo "Error updating record Rating is to high: " ;

$conn->close();
exit;
}

$sql= "UPDATE review SET Rate='$Rate' , Comment='$Comment' WHERE rvrID='$userID' and pID=$paper";


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    
} else {
    echo "Error updating record: " . $conn->error;
}

if(isset($_POST['signUp'])=="Add Paper"){
header("Location: http://localhost/myProject/thisAuthor.html");
echo "New record created successfully";
exit;
}




$conn->close();


 ?>