<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
    header("Location: slider.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dash.css">
    <title>Dashboard</title>
  </head>
  <body>
    <?php include "header.php"; ?>




  </body>
</html>
<?php
  }else{
      header("Location: ../login.php");
  }
?>
