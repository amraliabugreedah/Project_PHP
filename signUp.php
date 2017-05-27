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

if($_POST["uName"]==""||$_POST["psw"]==""||!isset($_POST["conf"])){
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

$confName = $_POST['conf'];




$result =mysqli_query($conn,"SELECT userName FROM users WHERE userName = '$uName'");

if($result && mysqli_num_rows($result) > 0){
	die("Username already exists");
	$conn->close();
}



///upload file and create new entery
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
// $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // if(isset($_POST["uName"])!=""&&isset($_POST["psw"])!=" "&&isset($_POST["confName"])!=" "){
    	$sql = "INSERT INTO users (userName,password,firstName,lastName,admin,chair,reviewer,Author)
		VALUES ('$uName','$psw', '$fName', '$lName',0,0,0,1)";
		
		
        // else{
        //     die("please enter username , password and conference name");
        //      $conn->close();

        // }

        $resultCon=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cid , deadLine FROM conferences WHERE cid = '$confName'"));
        $confID=$resultCon['cid'] ; 

        // $deadLine=$resultCon['deadLine'];

        // $currDate =date("Y-m-d H:i:s");
                                                                 // cannot get cid or deadline 
        // $timestamp = strtotime($deadLine);
        // $date = date("Y-m-d H:i:s", $timestamp);

        // if($date < $currDate){
        //     echo "You missed the deadline of adding paper to this conference";
        //     exit;
        // }

        $result=mysqli_fetch_assoc(mysqli_query($conn,"SELECT userID FROM  users ORDER BY userID DESC LIMIT 1"));
        $userID=$result['userID']+1;
       session_start();
       $_SESSION["thisAuthorID"] = $userID;

		$sql1 ="INSERT INTO papers (uid,cid,url)
		VALUES ('$userID','$confName','$target_file')";
        
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
// }



if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if(isset($_POST['signUp'])=="Sign up"){
header("Location: http://localhost/myProject/thisAuthor1.php");
exit;
}




$conn->close();


 ?>