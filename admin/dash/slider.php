<?php
  include "../connect.php";
  session_start();
  if(isset($_SESSION['username'])){
    $userloggedin = $_SESSION['username'];
    if (isset($_GET['upl'])) {
      echo "<div class='popup-true'>Image Uploaded</div>";
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
    <a class="aminimize" href="../../index.php?min=1">
      <div class="minimize">
        <img src="img/mm.png" alt=""><span> Minimize</span>
      </div>
    </a>
    <?php include "header.php" ?>
    <section class="main-body">
      <h2 class="field-heading">Insert Slider</h2>
      <form action="slider.php" method="post" enctype="multipart/form-data" class="emp-ins">
        <div class="inp-fields">
          <input type="file" name="file" id="name" class="emp-ins-btn" required>
        </div>
        <input type="submit" name="Submit" value="Insert image" class="emp-ins-btn">
      </form>

      <div class="status-table">
          <?php
            $query = "SELECT * FROM tb_sliders";
            $res=$con->query($query);
            if ($res->num_rows==0) {
              echo "<div class='status-title'>no Images in slider</div>";
            }else{
          ?>
              <div class="status-cont">
              <?php
                while($row=$res->fetch_object()){
                  echo "<div class='status-icb'>";
                  echo "<img src='../../images/hero/".$row->Image."' width='190px' height='110px' />";
                  echo "<form action='slider.php' method='get'>
                        <button class='status-btn' name='oper_del' value='$row->SN'>Delete</button>
                        </form>";
                  echo "</div>";
                }
            }
              ?>
        </div>
      </div>
    </section>
    <!--image insert-->
    <?php
    	if(isset($_POST['Submit'])){
    		$file = $_FILES['file'];
        $filename=$_FILES['file']['name'];
        $fileloc = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
    		$fileerror=$_FILES['file']['error'];
    		$filetype=$_FILES['file']['type'];

    		$fileext=explode('.',$filename);
    		$filelowext=strtolower(end($fileext));
    		$allowed=array('jpg', 'jpeg', 'png', 'jfif');
        if(in_array($filelowext,$allowed)){
          if($fileerror === 0){
            if($filesize>8000){
              $filenewname = uniqid('').".".$filelowext;
              $filedest = "../../images/hero/" . $filenewname;
              move_uploaded_file($fileloc,$filedest);
              $query = "INSERT INTO tb_sliders VALUES ('','$filenewname')";
              $con->query($query);
              echo "<div class='popup-true'>Image Uploaded</div>";
              header("location: slider.php?upl=1");
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
      /*image delete*/
      if (isset($_GET['oper_del'])) {
        $oper=$_GET['oper_del'];
        $fordel = "SELECT Image FROM tb_sliders where SN='$oper'";
        $delname = $con->query($fordel);
        $imgname = $delname->fetch_object();
        $qry = "DELETE from tb_sliders where SN='$oper'";
        if ($con->query($qry)) {
          unlink("../../images/hero/".$imgname->Image);
          header("location:" . $_SERVER['PHP_SELF']);
        }else{
          echo "<div class='popup-false'>Delete failed</div>";
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
