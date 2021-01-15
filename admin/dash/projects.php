<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
    // if (isset($_GET['upl'])) {
    //   echo "<div class='popup-true'>Project Uploaded</div>";
    // }
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
    <a class="aminimize" href="../../pages/ongoing.php?min=1">
      <div class="minimize">
        <img src="img/mm.png" alt=""><span> Ongoing</span>
      </div>
    </a>
    <a class="aminimize" href="../../pages/completed.php?min=1">
      <div class="cminimize">
        <img src="img/mm.png" alt=""><span> Completed</span>
      </div>
    </a>
    <?php include "header.php"; ?>
    <section class="main-body">
      <h2 class="field-heading">Projects</h2>
      <div class="pro_link">
        <a href="add_project.php" class="emp-ins emp-ins-btn">Add Project</a>
        <a href="edit_project.php" class="emp-ins emp-ins-btn">Edit Project</a>
        <a href="delete_project.php" class="emp-ins emp-ins-btn">Delete Project</a>
      </div>
    </section>



  </body>
</html>
<?php
  }else{
      header("Location: ../login.php");
  }
?>
