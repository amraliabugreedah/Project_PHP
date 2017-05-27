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


if(!isset($_POST["conf"])){
    echo "Missing fields";
    exit;
}

$confName =$_POST['conf'];

///upload file and create new entery
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
        $resultConf=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cid , deadLine FROM conferences WHERE confName = '$confName'"));
        $confID=$resultConf['cid'] ; 
        $deadLine=$resultConf['deadLine'];

        $currDate =date("Y-m-d H:i:s");

        $timestamp = strtotime($deadLine);
        $date = date("Y-m-d H:i:s", $timestamp);

        if($date < $currDate){
            echo "You missed the deadline of adding paper to this conference";
            exit;
        }
      


        session_start(); 
        $userID = $_SESSION["thisUserID"];

		$sql1 ="INSERT INTO papers (uid,cid,url)
		VALUES ('$userID','$confID','$target_file')";
        
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        exit;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }




if ($conn->query($sql1) === TRUE) {
    
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

// if(isset($_POST['Add Paper'])=="Add Paper"){
// echo "New record created successfully";
// // exit;
// }




$conn->close();


// header("Location: http://localhost/myProject/thisAuthor1.php");
 ?>