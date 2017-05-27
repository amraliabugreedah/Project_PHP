
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

if(isset($_POST['signUpAuthor'])=="Or sign up as Author"){
header("Location: http://localhost/myProject/signUp1.php");
exit;
}
if($_POST["uName"]==""||$_POST["psw"]==""){
	echo "Missing fields";
	exit;
}

$uName =$_POST["uName"];
$pass =$_POST["psw"];

$result=mysqli_fetch_assoc(mysqli_query($conn,"SELECT userID,password,chair,admin,reviewer,Author FROM users WHERE userName = '$uName'"));
$pw=$result['password'];
$chair=$result['chair'];
$admin=$result['admin'];
$reviewer=$result['reviewer'];
$Author=$result['Author'];

  $userID=$result['userID'] ; 
         session_start();
       $_SESSION["thisUserID"] = $userID;


if($pass==$pw){
	echo "Signed in successfully";

	if(isset($_POST['signIn'])=="Sign in"){
		if($chair==1){
		header("Location: http://localhost/myProject/thisChair1.php");
		exit;
	}else if($admin==1){
		header("Location: http://localhost/myProject/Admin.html");
		exit;
	}else if($reviewer==1){
		header("Location: http://localhost/myProject/thisReviewer1.php");
		exit;
	}else if($Author==1){
		header("Location: http://localhost/myProject/thisAuthor1.php");
		exit;
	}

	}
}
else {
    echo "Password is incorrect ";
}
      


$conn->close();


?>
