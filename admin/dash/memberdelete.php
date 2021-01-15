<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
    if (isset($_GET['del'])) {
      echo "<div class='popup-true'>Data Deleted</div>";
    }
    if (isset($_GET['upl'])) {
      echo "<div class='popup-true'>Data Updated</div>";
    }
    if (isset($_GET['err'])) {
      echo "<div class='popup-false'>Data Not found</div>";
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
    <a class="aminimize" href="../../pages/allmember.php?min=2">
      <div class="minimize">
        <img src="img/mm.png" alt=""><span> Minimize</span>
      </div>
    </a>
    <?php include "header.php" ?>
    <section class="main-body">
      <h2 class="field-heading">Search Members Name</h2>
      <form action="memberdelete.php" method="post" enctype="multipart/form-data" class="emp-ins">
        <div class="inp-fields">
          <input type="text" name="mem_name" class="emp-ins-inp" placeholder="Member Name" autocomplete="off" required>
        </div>
        <input type="submit" name="Submit" value="Submit Data" class="emp-ins-btn">
      </form>
      <?php
        if (isset($_POST['Submit'])) {
          $memname = $_POST['mem_name'];
          $imgpath = "../../images/members/";
          $query = "SELECT * from tb_members where Name='$memname'";
          $memres = $con->query($query);
          $merow = $memres->fetch_object();
          if (isset($merow)) {
            echo "<div class='member-info'>
                    <div class='image-sizing fleft'>
                      <img class='img-thumbnail' src='$imgpath$merow->Image' width='400px' height='285px'>
                    </div>
                    <div class='text-sizing'>
                      <h3>$merow->Name</h3>
                      <h4><i>$merow->Position</i></h4>
                      <h4><strong>Qualification:</strong> $merow->Qualification</h4>
                      <h4><strong>Experiences:</strong> $merow->Experiences</h4>
                      <h4><strong>Contact no:</strong> $merow->Number</h4>
                      <div class='col-sm-6'>
                        <p class='social facebook'>$merow->Flink</p>
                        <p class='social twitter'>$merow->Tlink</p>
                        <p class='social googleplus'>$merow->Glink</p>
                      </div>
                    </div>
                  </div>";
            echo "<form method='get' action='mdelete.php' class='delete_mem'>
                    <input type='submit' name='delete_member' value='Delete Data' class='emp-ins-btn'>
                    <input type='hidden' name='image' value='$merow->Image'>
                    <input type='hidden' name='sn' value='$merow->SN'>
                  </form>";
            echo "<form method='get' action='memberedit.php' class='edit_mem'>
                    <input type='submit' name='edit_member' value='Edit Data' class='emp-ins-btn'>
                    <input type='hidden' name='sn' value='$merow->SN'>
                  </form>";
          }else{
            header("Location: memberdelete.php?err=1");
          }
        }
      ?>
    </section>

  </body>
</html>


<?php
  }else{
      header("Location: ../login.php");
  }
?>
