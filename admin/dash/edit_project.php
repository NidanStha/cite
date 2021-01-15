<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
    if (isset($_GET['edt'])) {
      echo "<div class='popup-true'>Data Edited</div>";
    }
    if (isset($_GET['err'])) {
      echo "<div class='popup-false'>Project not found</div>";
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css" type="text/css">
    <title>Dashboard</title>
  </head>
  <body>
    <?php include "header.php"; ?>
    <section class="main-body">
      <h2 class="field-heading">Search Project</h2>
      <form action="edit_projectP.php" method="post" enctype="multipart/form-data" class="emp-ins">
        <div class="inp-fields">
          <input type="text" name="pro_name" class="emp-ins-inp" placeholder="Project Name" autocomplete="off" required>
        </div>
        <input type="submit" name="Submit" value="Submit Data" class="emp-ins-btn">
      </form>

    </section>

  </body>
</html>


<?php
  }else{
      header("Location: ../login.php");
  }
?>
