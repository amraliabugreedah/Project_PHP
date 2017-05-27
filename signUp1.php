<html>
<head>
	<title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="myCSS.css">
</head>
<body >

<form action="signUp.php" method="post" enctype="multipart/form-data" >
   <div>
      
      <input class="field" type="text" name="fName" placeholder="First name" ><br><br>
      
      <input class="field" type="text" name="lName"  placeholder="Last name"><br><br>
      
      <input class="field" type="text" name="uName"  placeholder="Email"><br><br>
 
      <input class="field" type="password" name="psw" placeholder="Password"><br><br>

      <!-- <input class="field" type="text" name="confName"  placeholder="Conference"><br><br> -->
      <?php include 'getConf.php'; ?>

      <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>

      <input class="submit" type="submit" name="signUp" value="Sign up">

  </div>
</form>


</body>
</html>