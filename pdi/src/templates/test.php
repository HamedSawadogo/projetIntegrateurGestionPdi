<?php
session_start();
$_SESSION['username']=$_POST['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <h1>Bienvenu! <?=$_SESSION['username'];?></h1>
   <a href="file.php">demander a file s'il te connais</a>
</body>

</html>