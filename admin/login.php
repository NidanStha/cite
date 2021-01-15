<?php
  include "connect.php";
  if (isset($_GET['reg'])) {
    echo "<div class='popup-true'>Admin registered</div>";
  }
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
        <h3>Admin Login</h3>
        <a href="../index.php" class="close">X</a>
        <form action="login.php" method="post">
            <input class="admin_txt" type="text" name="username" placeholder="Username" autocomplete="off" required autofocus>
            <input class="admin_txt" type="password" name="password" placeholder="Password">
            <input class="admin_sub" type="submit" value="Login" name="submit">
            <span> <small>Not registered?</small> <a href="register.php">Create an account</a></span>
        </form>
        <?php
          if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $qry = "SELECT * from tb_admin where Username='$username'";
            $result = $con->query($qry);
            $row = $result->fetch_object();
            if(isset($row) && password_verify($password,$row->Password)){
                session_start();
                $_SESSION['username'] = $username;
                header("Location: dash/slider.php");
              }
              else {
                echo "<div class='popup-false'>User not found</div>";
              }
            }
        ?>
    </div>
</body>
</html>
