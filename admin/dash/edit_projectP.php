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
    <?php include "header.php"; ?>
    <section class="main-body">
      <h2 class="field-heading">Edit Project</h2>
      <?php
        if (isset($_POST['Submit'])) {
          $proname = $_POST['pro_name'];
          $imgpath = "../../images/iprojects/";
          $query = "SELECT * from tb_project where Pname='$proname'";
          $prores = $con->query($query);
          $porow = $prores->fetch_object();
          if (isset($porow)) {
      ?>
      <form action="pedit.php" method="post" enctype="multipart/form-data" class="emp-ins">
        <div class="member-info">
          <div class="image-sizing fleft">
            <img src="../../images/iprojects/<?php echo $porow->Pimage; ?>" class="img-thumbnail" width="400px" height="285px">
          </div>
          <div class="text-sizing">
            <div class="inp-fields">
              <input type="file" name="file" value="<?php echo $porow->Pimage; ?>" class="emp-ins-btn">
            </div>
            <div class="inp-fields">
              <input type="text" name="pro_name" value="<?php echo $porow->Pname; ?>" class="emp-ins-inp" placeholder="Project Name" autocomplete="off" required>
            </div>
            <div class="inp-fields">
              <?php
                if ($porow->Pcondition=='Ongoing'){?>
                  <select class="emp-ins-inp" name="pcond">
                    <option selected value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                  </select>
              <?php }else{ ?>
                <select class="emp-ins-inp" name="pcond">
                  <option value="Ongoing">Ongoing</option>
                  <option selected value="Completed">Completed</option>
                </select>
              <?php } ?>
            </div>
            <div class="inp-fields">
              <textarea rows="9" cols="35" name="pro_desc" class="emp-ins-inp" placeholder="Project Description" autocomplete="off" required>
                <?php echo $porow->Description; ?>
              </textarea>
            </div>
          </div>
          <input type="submit" name="edit" value="Submit Data" class="emp-ins-btn">
          <input type="hidden" name="ssn" value="<?php echo $porow->SN; ?>" class="emp-ins-btn">
          <input type="hidden" name="iimg" value="<?php echo $porow->Pimage; ?>" class="emp-ins-btn">
        </div>
      </form>
      <?php }else {
        header("Location: edit_project.php?err=1");
      }
    }?>
    </section>

  </body>
</html>


<?php
  }else{
      header("Location: ../login.php");
  }
?>
