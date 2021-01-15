<?php
  include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-form">
      <h3>New Admin Register</h3>
      <a href="login.php" class="close">X</a>
        <form action="register.php" method="post">
            <input class="admin_txt" type="text" name="reg_username" placeholder="Username" autocomplete="off" required />
            <input class="admin_txt" type="password" name="reg_password" placeholder="Password" required />
            <input class="admin_sub" type="submit" value="Register" name="submit" />
        </form>
    </div>
    <?php
      if (isset($_POST['submit'])){
        $username = $_POST['reg_username'];
        $password = $_POST['reg_password'];
        $hpass = password_hash($password, PASSWORD_DEFAULT);
        $quer = "INSERT INTO tb_admin VALUES ('','$username','$hpass')";
        if ($con->query($quer)) {
            header("location: login.php?reg=1");
        }else {
            echo "<div class='popup-false'>something went wrong</div>";
        }
      }
    ?>
</body>
</html>
