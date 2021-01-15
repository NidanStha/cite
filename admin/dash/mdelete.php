<?php
include "../connect.php";
if(isset($_GET['delete_member'])){
  $delimg=$_GET['image'];
  $id=$_GET['sn'];
  $qry = "DELETE from tb_members where SN='$id'";
  if ($con->query($qry)) {
    unlink("../../images/members/".$delimg);
    header("location:" . "memberdelete.php?del=1");
  }else {
    echo "<div class='popup-false'>not deleted</div>";
  }

}else{
  header("location:" . "memberdelete.php?del=b");
}

 ?>
