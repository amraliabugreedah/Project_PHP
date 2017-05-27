<html>
<head>
	<title>This Reviewer</title>
  <link rel="stylesheet" type="text/css" href="myCSS.css">
</head>
<body >

<form action="thisReviewer.php" method="post" enctype="multipart/form-data" >
   <div>

      <?php include 'getPaperThisRvr.php'; ?>

      <input class="field" type="text" name="Rate" placeholder="Rate from 1 to 10" ><br><br>  
    <input class="field" type="text" name="Comment"  placeholder="Comment"><br><br>

      <input class="submit" type="submit" name="RevPaper" value="RevPaper"><br><br>


  	
   



  </div>
</form>


</body>
</html>