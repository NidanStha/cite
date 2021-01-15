<?php
  include "../admin/connect.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>NSS | On Going</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="icon" href="../images/icon.png">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../stylesheets/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
  <link rel="stylesheet" href="../stylesheets/main.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
    if (isset($_GET['min'])) {
      echo "
        <a href='../admin/dash/projects.php' class='amaximize'>
          <div class='admin_max'>
            <img src='../images/user.png' />
            <span>Maximize</span>
          </div>
        </a>
      ";
    }
    ?>
<!--navbar inverse -->
<nav class="navbar-fixed-top navbar-inverse md--navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php"><span class="main-logo">NSS</span><br><span class="sub-logo">Nepal</span></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-3">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="ourGoal.html">Our Goals</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Programs<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="ongoing.php">Ongoing</a></li>
            <li><a href="completed.php">Completed</a></li>
          </ul>
        </li>
        <li><a href="allmember.php">Members</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>
<!-- /.navbar -->

<!-- Our Goals section -->
<section>
  <div class="container">
    <div class="row">
      <div class="ongoing">
        <div class="container">
          <div class="row">
              <div class="col-sm-6 ongoing__left"> <h3>Ongoing Programs</h3> </div>
              <div class="col-sm-6 ongoing__right"> <a href="../index.php">HOME</a> | Ongoing Programs </div>
          </div>
          <hr class="ongoing__hr">
        </div>
        <div class="ongoing__textcontents">
          <p>
            Temporary Learning Centre is on construct in 20 different schools in Sindhuli district more than 800 students will be benefited by these. It has been supported by UNICEF through Restless Development Nepal. 577 Schools will be obtained ECD kit recreation kit and bags in school supported by UNICEF.
          </p>
          <ul>
            <li>
              Training for head teachers and ECD facilitators for using teaching material which is distributed by UNICEF through Restless Development country office Kathmandu.
            </li>
            <li>
              Workshop of effective use of information and communication techology in the classroom has been conducted in 2017 augusta 13th and 14th supported by UNESCO Nepal.
            </li>
          </ul>
        </div>

        <div class="col-xs-18 col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="../images/ongoing/1.jpeg" alt="">
              <div class="caption">
                <h4 class="text-center">UNICEF Bags</h4>
              </div>
          </div>
        </div>

        <div class="col-xs-18 col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="../images/ongoing/2.jpeg" alt="">
              <div class="caption">
                <h4 class="text-center">Traning</h4>
              </div>
          </div>
        </div>

        <div class="col-xs-18 col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="../images/ongoing/3.jpeg" alt="">
              <div class="caption">
                <h4 class="text-center">Techology classroom</h4>
              </div>
          </div>
        </div>
        <?php
          $qry = "SELECT * FROM tb_project where Pcondition='ongoing'";
          $res = $con->query($qry);
          while($row = $res->fetch_object()){
        ?>
          <div class="container">
            <div class="row">
                <div class="col-sm-8 ongoing__left"> <h3><?php echo $row->Pname; ?></h3> </div>
            </div>
            <hr class="ongoing__hr">

            <div class="ongoing__textcontents">
              <p>
                <?php echo $row->Description; ?>
              </p>
            </div>
            <div class="col-xs-18 col-sm-8 col-md-12">
              <div class="e_thumbnail">
                <img class="img-responsive" src="../images/iprojects/<?php echo $row->Pimage; ?>" alt="">
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact section -->
<section class="contact">
  <div class="container">
    <div class="row">
      <h1 class="text-center"> Contact Us </h1>
      <div class="col-sm-3">
        <div class="contact__aboutus">
          <h4> About Us </h4>
          <p>
            Nepal Social Service (NSS) is one of the non-profitable organization. It is established in 2055 B.S. It is different organization than conducting other organizations in  rural area of Nepal. The organization has own existence on the field of the community. <a href="about.html"> Read More </a>
          </p>
        </div>
      </div>
      <div class="col-sm-3">
        <h4>Site Map</h4>
        <ul class="contact__sitemap">
          <li><a href="../index.php">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="ourGoal.html">Our Goals</a></li>
          <li><a href="completed.php">Completed Projects</a></li>
          <li><a href="ongoing.php">Ongoing Projects</a></li>
          <li><a href="pages/allmember.php">Executive Board Members</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h4> Contact Info </h4>
        <p>
          Address: Kuleshwor, Tinkune<br>
          Contact No.: 9840000000<br>
          Email: info@nss.com
        </p>
      </div>
      <div class="col-sm-3">
        <h4> Keep Connected </h4>
        <div>
          <!--Facebook-->
          <a href="#" class="social facebook" title="Facebook"><svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg><!--[if lt IE 9]><em>Facebook</em><![endif]--></a>

          <!--Twitter-->
          <a href="#" class="social twitter" title="Twitter"><svg viewBox="0 0 512 512"><path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"/></svg><!--[if lt IE 9]><em>Twitter</em><![endif]--></a>

          <!--Google Plus-->
          <a href="#" class="social googleplus" title="GooglePlus"><svg viewBox="0 0 512 512"><path d="M179.7 237.6L179.7 284.2 256.7 284.2C253.6 304.2 233.4 342.9 179.7 342.9 133.4 342.9 95.6 304.4 95.6 257 95.6 209.6 133.4 171.1 179.7 171.1 206.1 171.1 223.7 182.4 233.8 192.1L270.6 156.6C247 134.4 216.4 121 179.7 121 104.7 121 44 181.8 44 257 44 332.2 104.7 393 179.7 393 258 393 310 337.8 310 260.1 310 251.2 309 244.4 307.9 237.6L179.7 237.6 179.7 237.6ZM468 236.7L429.3 236.7 429.3 198 390.7 198 390.7 236.7 352 236.7 352 275.3 390.7 275.3 390.7 314 429.3 314 429.3 275.3 468 275.3"/></svg><!--[if lt IE 9]><em>GooglePlus</em><![endif]--></a>
        <div>
      </div>
    </div>
  </div>
</section>
<!-- End of contact -->

<footer>
  <div class="bottom">
    <a href="https://www.facebook.com/nedan.stha" target="_blank">
      <p> Copyright &copy; NDN Web Work</p>
    </a>
  </div>
</footer>
</body>
</html>
