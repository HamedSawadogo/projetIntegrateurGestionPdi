<?php
session_start();

var_dump($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <h1>File Bienvenu! <?php echo $_SESSION['username']; ?></h1>
</body>

</html>