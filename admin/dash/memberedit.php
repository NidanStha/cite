<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
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
    <?php include "header.php" ?>
    <section class="main-body">
      <h2 class="field-heading">Edit Member</h2>
      <?php
        if (isset($_GET['edit_member'])) {
          $memsn = $_GET['sn'];
          $imgpath = "../../images/members/";
          $query = "SELECT * from tb_members where SN='$memsn'";
          $memres = $con->query($query);
          $merow = $memres->fetch_object();
          if (isset($merow)) {
            echo "<form action='medit.php' method='post' enctype='multipart/form-data' class='emp-ins'>
                    <div class='member-info'>
                      <div class='inp-fields'>
                        <img class='imgedit' src='../../images/members/$merow->Image' width='200px' height='185px'>
                        <input type='file' name='file' value='$merow->Image' class='emp-ins-btn'>
                      </div>
                      <div class='inp-fields'>
                        <input type='text' name='mem_name' class='emp-ins-inp' value='$merow->Name' placeholder='Member Name' autocomplete='off' required>
                      </div>
                      <div class='inp-fields'>
                        <input type='text' name='mem_pose' class='emp-ins-inp' value='$merow->Position' placeholder='Member Position' autocomplete='off' required>
                      </div>
                      <div class='inp-fields'>
                        <input type='text' name='mem_qual' class='emp-ins-inp' value='$merow->Qualification' placeholder='Member Qualification' autocomplete='off' required>
                      </div>
                      <div class='inp-fields'>
                        <input type='text' name='mem_exp' class='emp-ins-inp' value='$merow->Experiences' placeholder='Member Experience' autocomplete='off' required>
                      </div>
                      <div class='inp-fields'>
                        <input type='text' name='mem_num' class='emp-ins-inp' value='$merow->Number' placeholder='Phone Number' autocomplete='off' required>
                      </div>
                      <div class='inp-fields'>
                        <img src='img/facebook.png' width='20px'>
                        <input type='text' name='mem_flink' class='emp-ins-inp slink' value='$merow->Flink' placeholder='Facebook Link' autocomplete='off'>
                      </div>
                      <div class='inp-fields'>
                        <img src='img/twitter.png' width='20px'>
                        <input type='text' name='mem_tlink' class='emp-ins-inp slink' value='$merow->Tlink' placeholder='Twitter Link' autocomplete='off'>
                      </div>
                      <div class='inp-fields'>
                        <img src='img/google.png' width='20px'>
                        <input type='text' name='mem_glink' class='emp-ins-inp slink' value='$merow->Glink' placeholder='Google pluse ID' autocomplete='off'>
                      </div>
                      <input type='submit' name='edit' value='Confirm' class='emp-ins-btn edit_mem'>
                      <input type='hidden' name='ssn' value='$merow->SN'>
                      <input type='hidden' name='iimg' value='$merow->Image'>
                    </div>
                  </form>";
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
