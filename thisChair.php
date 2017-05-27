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
if(isset($_POST['RevPaper'])=="RevPaper"){

if(!isset($_POST["reviewers"])||!isset($_POST["papers"])){
	echo "Missing fields";
	exit;
}

$reviewer =$_POST['reviewers'];
$paper =$_POST['papers'];

$sql ="INSERT INTO review (rvrID,pID)
        VALUES ('$reviewer','$paper')";
}
       

 else if(isset($_POST['createConf'])=="createConf"){

 	if($_POST["confName"]==""||$_POST["confDeadLine"]==""){
	echo "Missing fields";
	exit;
}
 	 session_start(); 
        $userID = $_SESSION["thisUserID"];
$confName =$_POST['confName'];
$confDeadLine =$_POST['confDeadLine'];

$timestamp = strtotime($confDeadLine);
$date = date("Y-m-d H:i:s", $timestamp);


$sql ="INSERT INTO conferences (chairID,confName,deadline)
        VALUES ('$userID','$confName','$date')";
}

if ($conn->query($sql) === TRUE) {
    echo "successfully created";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if(isset($_POST['signUp'])=="Add Paper"){
header("Location: http://localhost/myProject/thisAuthor.html");
echo "New record created successfully";
exit;
}




$conn->close();


 ?>