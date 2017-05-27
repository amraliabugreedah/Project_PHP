<html>
<head>
	<title>This Chair</title>
  <link rel="stylesheet" type="text/css" href="myCSS.css">
</head>
<body >

<form action="thisChair.php" method="post" enctype="multipart/form-data" >
   <div>
      <!-- <input class="field" type="text" name="confName"  placeholder="Conference"><br><br> -->
      <?php include 'getReviewer.php'; ?>
      <?php include 'getPaper.php'; ?>
      <input class="submit" type="submit" name="RevPaper" value="RevPaper"><br><br>


	<input class="field" type="text" name="confName" placeholder="Conference name" ><br><br>	
  	<input class="field" type="text" name="confDeadLine"  placeholder="YYYY-MM-DD HH:MM:SS"><br><br>
    <input class="submit" type="submit" name="createConf" value="createConf">



  </div>
</form>


</body>
</html>