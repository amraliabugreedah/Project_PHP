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


if($_POST["uName"]==""||$_POST["psw"]==""){
	echo "Missing fields";
	exit;
}
$email=$_POST["uName"];
if (!filter_var($_POST["uName"], FILTER_VALIDATE_EMAIL) === false) {
  
} else {
  echo("$email is not a valid email address");
  exit;
}
$uName =$_POST["uName"];
$psw =$_POST["psw"];
$fName =$_POST["fName"];
$lName =$_POST["lName"];

if(isset($_POST["uTAdmin"])){
$uTAdmin =$_POST["uTAdmin"];
}
if(isset($_POST["uTChair"])){
$uTChair =$_POST["uTChair"];
}
if(isset($_POST["uTReviewer"])){
$uTReviewer =$_POST["uTReviewer"];
}

// if(isset($_POST["uTAdmin"])&&isset($_POST["uTChair"])&&isset($_POST["uTReviewer"])||isset($_POST["uTAdmin"])&&isset($_POST["uTChair"])&&!isset($_POST["uTReviewer"])||isset($_POST["uTAdmin"])&&!isset($_POST["uTChair"])&&isset($_POST["uTReviewer"])||!isset($_POST["uTAdmin"])&&isset($_POST["uTChair"])&&isset($_POST["uTReviewer"])){
// 	die("please choose one user type only !!");
// 	$conn->close();
// }

if(isset($_POST["uTAdmin"])&&!isset($_POST["uTChair"])&&!isset($_POST["uTReviewer"])){
if($uTAdmin=="a"){$uTAdmin=1;$uTChair=0;$uTReviewer=0;}
}
else if(!isset($_POST["uTAdmin"])&&isset($_POST["uTChair"])&&!isset($_POST["uTReviewer"])){
if($uTChair=="c"){$uTAdmin=0;$uTChair=1;$uTReviewer=0;}
}
else if(!isset($_POST["uTAdmin"])&&!isset($_POST["uTChair"])&&isset($_POST["uTReviewer"])){
if($uTReviewer=="r"){$uTAdmin=0;$uTChair=0;$uTReviewer=1;}
} else {
	die("please choose one user type only !!");
	$conn->close();
	exit;
}

$result =mysqli_query($conn,"SELECT userName FROM users WHERE userName = '$uName'");

if($result && mysqli_num_rows($result) > 0){
	die("Username already exists");
	$conn->close();
}

// if(($uTAdmin==1&&$uTChair==0&&$uTReviewer==0)||($uTAdmin==0&&$uTChair==1&&$uTReviewer==0)||($uTAdmin==0&&$uTChair==0&&$uTReviewer==1)){
$sql = "INSERT INTO users (userName,password,firstName,lastName,admin,chair,reviewer)
VALUES ('$uName','$psw', '$fName', '$lName','$uTAdmin','$uTChair','$uTReviewer')";
// }


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo '<br>';


$conn->close();

// if(isset($_POST['signUp'])=="Sign up"){
// header("Location: http://localhost/myProject/Admin.html");
// exit;
// }


 ?>