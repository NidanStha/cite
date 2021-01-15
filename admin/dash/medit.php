<?php
include "../connect.php";
if(isset($_POST['edit'])){
  $edit=$_POST['ssn'];
  $iimg=$_POST['iimg'];
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
  if ($fileerror === 0) {
    if(in_array($filelowext,$allowed)){
      if($fileerror === 0){
        if($filesize>8000){
          $filenewname = uniqid('').".".$filelowext;
          $filedest = "../../images/members/" . $filenewname;
          if (strlen($mem_num)!==10) {
            echo "<div class='popup-false'>Invalid number</div>";
          }else {
            unlink("../../images/members/".$iimg);
            move_uploaded_file($fileloc,$filedest);
            $query = "UPDATE tb_members set Image='$filenewname', Name='$mem_name', Position='$mem_pos', Qualification='$mem_qual', Experiences='$mem_exp', Number='$mem_num', Flink='$mem_flink', Tlink='$mem_tlink', Glink='$mem_glink' where SN='$edit'";
            if ($con->query($query)) {
              header("location: memberdelete.php?upl=1");
            }else {
              echo "<div class='popup-false'>Something went wrong.</div>";
            }
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
    if (strlen($mem_num)!==10) {
      echo "<div class='popup-false'>Invalid number</div>";
    }else {
      $query = "UPDATE tb_members set Image='$iimg', Name='$mem_name', Position='$mem_pos', Qualification='$mem_qual', Experiences='$mem_exp', Number='$mem_num', Flink='$mem_flink', Tlink='$mem_tlink', Glink='$mem_glink' where SN='$edit'";
      if ($con->query($query)) {
        header("location: memberdelete.php?upl=1");
      }else {
        echo "<div class='popup-false'>Something went wrong.</div>";
      }
    }
  }
}else{
  header("location:" . "memberdelete.php?del=b");
}

 ?>
