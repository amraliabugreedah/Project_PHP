<html>
<head>
	<title>This Author</title>
  <link rel="stylesheet" type="text/css" href="myCSS.css">
</head>
<body >

<form action="thisAuthor.php" method="post" enctype="multipart/form-data" >
   <div>
      <!-- <input class="field" type="text" name="confName"  placeholder="Conference"><br><br> -->
      <?php include 'getConf.php'; ?>

      <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>

      <input class="submit" type="submit" name="Add Paper" value="Add Paper">

  </div>
</form>


</body>
</html>