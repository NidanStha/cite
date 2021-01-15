<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
    if (isset($_GET['del'])) {
      echo "<div class='popup-true'>Project Deleted</div>";
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
      <h2 class="field-heading">Delete Project</h2>
      <form action="delete_project.php" method="post" enctype="multipart/form-data" class="emp-ins">
        <div class="inp-fields">
          <input type="text" name="pro_name" class="emp-ins-inp" placeholder="Project Name" autocomplete="off" required>
        </div>
        <input type="submit" name="Submit" value="Submit Data" class="emp-ins-btn">
      </form>
      <?php
        if (isset($_POST['Submit'])) {
          $proname = $_POST['pro_name'];
          $imgpath = "../../images/iprojects/";
          $query = "SELECT * from tb_project where Pname='$proname'";
          $prores = $con->query($query);
          $prorow = $prores->fetch_object();
          if (isset($prorow)) {
            echo "<div class='member-info'>
                    <div class='image-sizing fleft'>
                      <img class='img-thumbnail' src='$imgpath$prorow->Pimage' width='400px' height='270px'>
                    </div>
                    <div class='text-sizing'>
                      <h3>$prorow->Pname</h3>
                      <h4><i>$prorow->Pcondition</i></h4>
                      <textarea disabled rows='12' cols='40'>$prorow->Description</textarea>
                    </div>
                  </div>";
                  ?>
                  <div class="inp-fields">
                    <form action="delete_projectP.php" method="post" enctype="multipart/form-data" class="delete_mem">
                      <input type="submit" name="delete" value="delete" class="emp-ins-btn">
                      <input type="hidden" name="ssn" value="<?php echo $prorow->SN; ?>" class="emp-ins-btn">
                    </form>
                  </div>
                  <?php
          }else{
            header("Location: delete_project.php?err=1");
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
