<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
    if (isset($_GET['upl'])) {
      echo "<div class='popup-true'>Data Uploaded</div>";
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
    <a class="aminimize" href="../../pages/allmember.php?min=1">
      <div class="minimize">
        <img src="img/mm.png" alt=""><span> Minimize</span>
      </div>
    </a>
    <?php include "header.php" ?>
    <section class="main-body">
      <h2 class="field-heading">Insert Member</h2>
      <form action="member.php" method="post" enctype="multipart/form-data" class="emp-ins">
        <div class="inp-fields">
          <input type="file" name="file" class="emp-ins-btn" required>
        </div>
        <div class="inp-fields">
          <input type="text" name="mem_name" class="emp-ins-inp" placeholder="Member Name" autocomplete="off" required>
        </div>
        <div class="inp-fields">
          <input type="text" name="mem_pose" class="emp-ins-inp" placeholder="Member Position" autocomplete="off" required>
        </div>
        <div class="inp-fields">
          <input type="text" name="mem_qual" class="emp-ins-inp" placeholder="Member Qualification" autocomplete="off" required>
        </div>
        <div class="inp-fields">
          <input type="text" name="mem_exp" class="emp-ins-inp" placeholder="Member Experience" autocomplete="off" required>
        </div>
        <div class="inp-fields">
          <input type="text" name="mem_num" class="emp-ins-inp" placeholder="Phone Number" autocomplete="off" required>
        </div>
        <div class="inp-fields">
          <img src="img/facebook.png" width="20px">
          <input type="text" name="mem_flink" class="emp-ins-inp slink" placeholder="Facebook Link" autocomplete="off">
        </div>
        <div class="inp-fields">
          <img src="img/twitter.png" width="20px">
          <input type="text" name="mem_tlink" class="emp-ins-inp slink" placeholder="Twitter Link" autocomplete="off">
        </div>
        <div class="inp-fields">
          <img src="img/google.png" width="20px">
          <input type="text" name="mem_glink" class="emp-ins-inp slink" placeholder="Google pluse ID" autocomplete="off">
        </div>
        <input type="submit" name="Submit" value="Submit Data" class="emp-ins-btn">
      </form>
    </section>
    <?php
      if(isset($_POST['Submit'])){
        $file = $_FILES['file'];
        $filename=$_FILES['file']['name'];
        $fileloc = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $fileerror=$_FILES['file']['error'];
        $filetype=$_FILES['file']['type'];
        $mem_name =$_POST['mem_name'];
        $mem_pos =$_POST['mem_pose'];
        $mem_qual =$_POST['mem_qual'];
        $mem_exp =$_POST['mem_exp'];
        $mem_num =$_POST['mem_num'];
        $mem_flink =$_POST['mem_flink'];
        $mem_tlink =$_POST['mem_tlink'];
        $mem_glink =$_POST['mem_glink'];
        if ($mem_flink == "") {
          $mem_flink = '#';
        }
        if ($mem_tlink == "") {
          $mem_tlink = '#';
        }
        if ($mem_glink == "") {
          $mem_glink = '#';
        }
        $fileext=explode('.',$filename);
        $filelowext=strtolower(end($fileext));
        $allowed=array('jpg', 'jpeg', 'png', 'jfif');
        if(in_array($filelowext,$allowed)){
          if($fileerror === 0){
            if($filesize>8000){
              $filenewname = uniqid('').".".$filelowext;
              $filedest = "../../images/members/" . $filenewname;
              if (strlen($mem_num)!==10) {
                echo "<div class='popup-false'>Invalid number</div>";
              }else {
                move_uploaded_file($fileloc,$filedest);
                $query = "INSERT INTO tb_members VALUES ('','$filenewname','$mem_name','$mem_pos','$mem_qual','$mem_exp','$mem_num','$mem_flink','$mem_tlink','$mem_glink')";
                $con->query($query);
                header("location: member.php?upl=1");
              }
            }else{
              echo "<div class='popup-false'>Image size too big</div>";
            }
          }else{
            echo "<div class='popup-false'>error in uploading</div>";
          }
        }else{
          echo "<div class='popup-false'>Wrong image format</div>";
        }
      }
    ?>
  </body>
</html>
<?php
  }else{
      header("Location: ../login.php");
  }
?>
