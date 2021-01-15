<?php
include "../connect.php";
  if(isset($_POST['edit'])){
  $ssn=$_POST['ssn'];
  $iimg=$_POST['iimg'];
  $file = $_FILES['file'];
  $filename=$_FILES['file']['name'];
  $fileloc = $_FILES['file']['tmp_name'];
  $filesize = $_FILES['file']['size'];
  $fileerror=$_FILES['file']['error'];
  $filetype=$_FILES['file']['type'];
  $pro_name =$_POST['pro_name'];
  $pro_cond =$_POST['pcond'];
  $pro_desc =$_POST['pro_desc'];
  $fileext=explode('.',$filename);
  $filelowext=strtolower(end($fileext));
  $allowed=array('jpg', 'jpeg', 'png', 'jfif');
  if ($fileerror == 0) {
    if(in_array($filelowext,$allowed)){
      if($fileerror == 0){
        if($filesize>8000){
          $filenewname = uniqid('').".".$filelowext;
          $filedest = "../../images/iprojects/" . $filenewname;
          unlink("../../images/iprojects/".$iimg);
          move_uploaded_file($fileloc,$filedest);
          $query = "UPDATE tb_project set Pname='$pro_name', Pcondition='$pro_cond', Description='$pro_desc', Pimage='$filenewname' where SN='$ssn'";
          if ($con->query($query)) {
            header("location: edit_project.php?edt=1");
          }else {
            echo "<div class='popup-false'>Something went wrong.gg</div>";
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
  }else {
      $query = "UPDATE tb_project set Pname='$pro_name', Pcondition='$pro_cond', Description='$pro_desc', Pimage='$iimg' where SN='$ssn'";
      if ($con->query($query)) {
        header("location: edit_project.php?edt=1");
      }else {
        echo "<div class='popup-false'>Something went wrong.</div>";
      }
    }
  }




 ?>
