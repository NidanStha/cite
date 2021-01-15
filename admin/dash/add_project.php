<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
    if (isset($_GET['upl'])) {
      echo "<div class='popup-true'>Project Uploaded</div>";
    }
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
    <section class="main-body">
      <h2 class="field-heading">Add Projects</h2>
      <form action="add_project.php" method="post" enctype="multipart/form-data" class="emp-ins">
        <div class="inp-fields">
          <input type="file" name="file" class="emp-ins-btn" required>
        </div>
        <div class="inp-fields">
          <input type="text" name="pro_name" class="emp-ins-inp" placeholder="Project Name" autocomplete="off" required>
        </div>
        <div class="inp-fields">
          <select class="emp-ins-inp" name="pcond">
            <option value="Ongoing">Ongoing</option>
            <option value="Completed">Completed</option>
          </select>
        </div>
        <div class="inp-fields">
          <textarea rows="5" cols="25" name="pro_desc" class="emp-ins-inp" placeholder="Project Description" autocomplete="off" required>
          </textarea>
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
        $pro_name =$_POST['pro_name'];
        $pro_desc =$_POST['pro_desc'];
        $pro_cond =$_POST['pcond'];
        $fileext=explode('.',$filename);
        $filelowext=strtolower(end($fileext));
        $allowed=array('jpg', 'jpeg', 'png', 'jfif');
        if(in_array($filelowext,$allowed)){
          if($fileerror === 0){
            if($filesize>8000){
              $filenewname = uniqid('').".".$filelowext;
              if ($pro_cond == 'Ongoing') {
                $filedest = "../../images/iprojects/" . $filenewname;
              }else {
                $filedest = "../../images/iprojects/" . $filenewname;
              }
              move_uploaded_file($fileloc,$filedest);
              $query = "INSERT INTO tb_project VALUES ('','$pro_name','$pro_cond','$pro_desc','$filenewname')";
              $con->query($query);
              header("location: add_project.php?upl=1");
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
