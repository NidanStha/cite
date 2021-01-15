<?php
  include "../connect.php";
  $ssn = $_POST['ssn'];
  $query = "DELETE FROM tb_project where SN='$ssn'";
  if ($con->query($query)) {
    header("location: delete_project.php?del=1");
  }else {
    header("location: delete_project.php?err=1");
  }
 ?>
