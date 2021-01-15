<?php
  include "admin/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>NEPAL SOCIAL SERVICE</title>
  <meta charset="UTF-8">
  <meta name="description" content="Integrated Rural Development Program (IRDP) SINDHULI is one of the non-profitable organization. It is established in 2068 B.S. It is different organization than conducting other organizations in Sindhhuli District. The organization has own existence on the field of the community. The ambition of this organization is differ then conducting  other organization. The main function of this organization is  inquiring and maintaining the problems of the people of the community by giving   them awareness training and workshop of different purposes.">
  <meta name="keywords" content="NGO,IRDP,Nepal,Sindhuli,Intergrated Rural Developement Program (IRDP)">
  <!-- <meta name="author" content="John Doe"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="icon" href="images/icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
	<link rel="stylesheet" href="stylesheets/main.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>

  <!-- For owl-carousel -->
  <link rel="stylesheet" type="text/css" href="stylesheets/owl-carousel/owl-carousel.css">

  <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="js/jquery-2.2.2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

  <script type="text/javascript" src="js/owl-carousel.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>

<body>
  <?php
  if (isset($_GET['min'])) {
    echo "
      <a href='admin/dash/slider.php' class='amaximize'>
        <div class='admin_max'>
          <img src='images/user.png' />
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
      <a class="navbar-brand" href="index.php"><span class="main-logo">NSS</span><br><span class="sub-logo">Nepal</span></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-3">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="pages/about.html">About</a></li>
        <li><a href="pages/ourGoal.html">Our Goals</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Programs<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="pages/ongoing.php">Ongoing</a></li>
            <li><a href="pages/completed.php">Completed</a></li>
          </ul>
        </li>
        <li><a href="pages/allmember.php">Members</a></li>
        <li><a href="pages/contact.html">Contact</a></li>

      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>
<!-- /.navbar -->

  <!-- slider -->
  <?php
    $slquery = "SELECT * FROM tb_sliders";
    $slres=$con->query($slquery);
    if ($slres->num_rows==0) {
      echo "<div class='status-title'>No Images in slider</div>";
    }else{
      $totimage = $slres->num_rows;
      $i=0;
  ?>
  <div id="carousel-example" class="carousel slide md--carousel" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php
        while($i<=$totimage-1){
          if ($i==0) {
            echo "<li data-target='#carousel-example' data-slide-to='$i' class='active'></li>";
          }else {
            echo "<li data-target='#carousel-example' data-slide-to='$i'></li>";
          }
          $i++;
        }
      }
      ?>
    </ol>
    <div class="carousel-inner">
      <?php
        $j=0;
        $imgpath = "images/hero/";
        while ($slrow=$slres->fetch_object()) {
          if ($j==0) {
            echo "<div class='item active'><a href='#'><img src='$imgpath$slrow->Image' /></a></div>";
          }else {
            echo "<div class='item'>
            <a href='#'><img src='$imgpath$slrow->Image' /></a>
            </div>";
          }
          $j++;
        }
      ?>
    </div>
    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span></a>
  </div>


  <!-- About Section started -->
  <section class="about">
    <div class="skewed">
      <div class="container skew-rev">
        <div class="row">
          <h1 class="text-center section-header rev-text">About Us</h1>
          <div class="col-sm-6">
            <!-- extra for image -->
            <img class="img-responsive img-thumbnail md--adjust img--box" src="images/about.jpeg">
          </div>
          <div class="col-sm-6 rev-text">
            <h2 class="sub-header">NEPAL SOCIAL SERVICE (NSS)</h2>
            <p class="section-paragraph">Nepal Social Service (NSS) is one of the non-profitable organization. It is established in 2055 B.S. It is different organization than conducting other organizations in rural area of Nepal. The organization has own existence on the field of the community. The ambition of this organization is different then conducting  other organization. The main function of this organization is inquiring and maintaining the problems of the people of the community by giving them awareness training and workshop of different purposes.</p>
            <a href="pages/about.html"><button class="about__button--white">Read More</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="no-skew">
      <div class="container">
        <h2 class="sub-header">Projects & Programs</h2>
        <p class="section-paragraph"><strong>Completed Projects/programs:</strong> Extra-Curriculum activities programs has been completed in 25 different schools in rural area of Nepal.</p>
        <p class="section-paragraph"><strong>Ongoing programs:</strong> Temporary learning Center is going to construct in different 20 schools in rural area where more than 800 students will be benefited by these. It has been supported by UNICEF through Restiess Developement Nepal. 577 Schools will obtained ECD kit recreation kit and school in bag supported by UNICEF.</p>
        <a href="pages/completed.php"><button class="about__button--green">Read More</button></a>
      </div>
    </div>
  </div>
</section>
<!-- End of About -->


<!-- Our Goal -->
<section class="ourGoal">
	<div id="goal" class="container-fluid text-center ourGoal__wrap">
		<div class="container">
		  <h1>Our Goals</h1>
		  <div class="row ourGoal__contents">
		    <div class="col-sm-4 ourGoal--box">
		      <i class="fa fa-usd logo-small" style="padding: 35px 40px;" aria-hidden="true"></i>
		      <h4><b>Income Source</b></h4>
		      <p>The organization wants to promote the poor people for increasing their income generation. </p>
		    </div>
		    <div class="col-sm-4 ourGoal--box">
		      <i class="fa fa-graduation-cap logo-small" aria-hidden="true" style="padding: 35px 30px;"></i>
		      <h4><b>Scholarship</b></h4>
		      <p>The organization wants to search the road children and bring them in school approaches. </p>
		    </div>
		    <div class="col-sm-4 ourGoal--box">
		      <i class="fa fa-book logo-small" aria-hidden="true" style="padding: 35px 35px;"></i>
		      <h4><b>Education</b></h4>
		      <p>Organization purposes the eradicating the education illiterate number of the country.</p>
		    </div>
		  </div>
		  <a href="pages/ourGoal.html"><button class="ourGoal__button">Read More</button></a>
		</div>
	</div>
</section>
<!-- End of Our Goal -->

<!-- Member Section Started -->
<section class="member">
  <div class="container-fluid">
    <div class="row">
      <center>
        <h1> Members </h1>
        <h3> (Executive Board Members)
        </center>
        <div class="carousel-container">
          <div id="slider-carousel" class="owl-carousel">
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/1.jpg">
              </a>
              <h4>Madan Prajapati</h4>
              <h5>(Chair Person)</h5>
            </div>
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/2.jpg">
              </a>
              <h4>Razz Shrestha</h4>
              <h5>(Vice Chair Person)</h5>
            </div>
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/3.jpg">
              </a>
              <h4>Jupiter Bade</h4>
              <h5>(Secretary)</h5>
            </div>
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/4.jpg">
              </a>
              <h4>Nidan Shrestha</h4>
              <h5>(Treasurer)</h5>
            </div>
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/5.jpg">
              </a>
              <h4>Suraj Kapali</h4>
              <h5>(Member)</h5>
            </div>
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/6.jpg">
              </a>
              <h4>Daniel Shrestha</h4>
              <h5>(Member)</h5>
            </div>
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/7.jpg">
              </a>
              <h4>Shristee Shrestha</h4>
              <h5>(Member)</h5>
            </div>
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/8.jpg">
              </a>
              <h4>Saru Prajapati</h4>
              <h5>(Member)</h5>
            </div>
            <div class="item">
              <a class="hoverfx" href="pages/allmember.php">
                <div class="figure">
                  View Details
                </div>
                <div class="overlay">
                </div>
                <img src="images/members/9.jpg">
              </a>
              <h4>Samjhana Rajbhandari</h4>
              <h5>(Member)</h5>
            </div>
          </div>
          <div class="customNavigation">
            <a class="btn-carousel gray prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <a class="btn-carousel gray next"><i class="fa fa-angle-right" aria-hidden="true"></i>
</a>
          </div>
        </div>
        <center><a href="pages/allmember.php"><button class="member__button" style="color: white;">Read More</button></a></center>
      </div>
    </div>
  </section>
<!-- End of member -->

<!-- Contact section -->
<section class="contact">
	<div class="container">
		<div class="row">
			<h1 class="text-center"> Contact Us </h1>
			<div class="col-sm-3">
				<div class="contact__aboutus">
					<h4> About Us </h4>
					<p>
						Nepal Social Service (NSS) is one of the non-profitable organization. It is established in 2055 B.S. It is different organization than conducting other organizations in  rural area of Nepal. The organization has own existence on the field of the community. <a href="pages/about.html"> Read More </a>
					</p>
				</div>
			</div>
			<div class="col-sm-3">
				<h4>Site Map</h4>
				<ul class="contact__sitemap">
					<li><a href="index.php">Home</a></li>
					<li><a href="pages/about.html">About</a></li>
					<li><a href="pages/ourGoal.html">Our Goals</a></li>
          <li><a href="pages/ongoing.php">Ongoing Projects</a></li>
					<li><a href="pages/completed.php">Completed Projects</a></li>
					<li><a href="pages/allmember.php">Executive Board Members</a></li>
					<li><a href="pages/contact.html">Contact</a></li>
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
      <p> Copyright &copy; NDN Web Work </p>
    </a>
  </div>
</footer>

<!-- Return to top button -->
<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i>
</a>
<script src="js/gotop.js"></script>
</body>

</html>
