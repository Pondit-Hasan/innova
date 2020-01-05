<?php
session_start();
require 'db_connect.php';
// NOT TO SHOW ERROR MESSAGES
error_reporting(0);
// query for get in touch section
$sql = "SELECT * FROM banners WHERE banner_status=1";
$sql_result = mysqli_query($db_connect, $sql);
$after_assoc = mysqli_fetch_assoc($sql_result);
// query for get in touch section
$sql_about = "SELECT * FROM abouts WHERE about_status=1";
$sql_about_result = mysqli_query($db_connect, $sql_about);
$after_assoc_about = mysqli_fetch_assoc($sql_about_result);
// query for get in touch section
$get_in_touch = "SELECT * FROM get_in_touch WHERE get_in_touch_status=1";
$get_in_touch_result = mysqli_query($db_connect, $get_in_touch);
$after_assoc_get_in_touch = mysqli_fetch_assoc($get_in_touch_result);
// query for logo
$logo = "SELECT * FROM logoes WHERE logo_status=1";
$logo_result = mysqli_query($db_connect, $logo);
$after_assoc_logo = mysqli_fetch_assoc($logo_result);
// query for services
$service = "SELECT * FROM services WHERE service_status=1 ORDER BY id DESC LIMIT 3";
$service_result = mysqli_query($db_connect, $service);
// query for testimonials
$testimonials = "SELECT * FROM testimonials WHERE testimonials_status=1";
$testimonials_result = mysqli_query($db_connect, $testimonials);
// set the time zone
date_default_timezone_set('Asia/Dhaka');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>INNOVA</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="innova_asset/img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="innova_asset/img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="innova_asset/img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="innova_asset/img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="innova_asset/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="innova_asset/fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="innova_asset/css/style.css">
<link rel="stylesheet" type="text/css" href="innova_asset/css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="innova_asset/css/nivo-lightbox/default.css">
<link rel="stylesheet" type="text/css" href="css/my_style.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top"><img class="logo" src="uploads/logoes/<?php echo $after_assoc_logo['logo_img']; ?>" alt=""> </a>
      <div class="phone"><span>Call Today</span>320-123-4321</div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">About</a></li>
        <li><a href="#services" class="page-scroll">Services</a></li>
        <li><a href="#testimonials" class="page-scroll">Testimonials</a></li>
        <li><a href="#contact" class="page-scroll">Contact</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
</nav>
<!-- Header -->
<header id="header">
  <div class="intro" style="background: url(uploads/banners/<?php echo $after_assoc['banner_img'] ?>) no-repeat; background-size: cover !important;">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 intro-text">
                <h1>
                  <?php echo $after_assoc['banner_title'] ?>
                </h1>
                <p><?php echo $after_assoc['banner_desp'] ?></p>
                <a href="#about" class="btn btn-custom btn-lg page-scroll"><?php echo $after_assoc['banner_btn']; ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Get Touch Section -->
<div id="get-touch">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-1">
        <h3><?php echo $after_assoc_get_in_touch['get_in_touch_title']; ?></h3>
        <p><?php echo $after_assoc_get_in_touch['get_in_touch_desp']; ?></p>
      </div>
      <div class="col-xs-12 col-md-4 text-center"><a href="#contact" class="btn btn-custom btn-lg page-scroll"><?php echo $after_assoc_get_in_touch['get_in_touch_btn']; ?></a></div>
    </div>
  </div>
</div>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6"> <img src="uploads/abouts/<?php echo $after_assoc_about['about_img']; ?>" class="img-responsive" alt=""> </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2><?php echo $after_assoc_about['about_title'] ?></h2>
          <p><?php echo $after_assoc_about['about_desp'] ?></p>
          <h3><?php echo $after_assoc_about['about_sub_title'] ?></h3>
          <div class="list-style">
            <div class="col-lg-12 col-sm-12 col-xs-12">
              <ul>
                <?php
                $after_explode = explode(',' , $after_assoc_about['about_features']);
                foreach ($after_explode as $value) { ?>
                  <li><?php echo $value ?></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<div id="services">
  <div class="container">
    <div class="section-title">
      <h2>Our Services</h2>
    </div>
    <div class="row">
      <?php foreach ($service_result as $value) { ?>
        <div class="col-md-4 service">
          <div class="service-media service_img"> <img src="uploads/services/<?php echo $value['service_img'] ?>" alt=" "> </div>
          <div class="service-desc">
            <h3><?php echo $value['service_title'] ?></h3>
            <p><?php echo $value['service_desp'] ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- Testimonials Section -->
<div id="testimonials">
  <div class="container">
    <div class="section-title">
      <h2>Testimonials</h2>
    </div>
    <div class="row">
      <?php foreach ($testimonials_result as $value) { ?>
        <div class="col-md-4 testimonials">
          <div class="testimonial">
            <div class="testimonial-image"> <img src="uploads/testimonials/<?php echo $value['testimonials_img'] ?>" alt="<?php $value['testimonials_img'] ?>"> </div>
            <div class="testimonial-content">
              <p><?php echo $value['testimonials_desp'] ?></p>
              <div class="testimonial-meta"> - <?php echo $value['testimonials_author'] ?> </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="col-md-8">
      <div class="row">
        <div class="section-title">
          <h2>Get In Touch</h2>
          <p>Please fill out the form below to send us an email and we will get back to you as soon as possible.</p>
          <?php if (isset($_SESSION['success'])): ?>
            <p><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
          <?php endif; ?>
        </div>
        <form name="sentMessage" id="contactForm" novalidate action="contact_post.php" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input name="fname" type="text" id="name" class="form-control" placeholder="Name" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input name="email" type="email" id="email" class="form-control" placeholder="Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input name="send_time" type="hidden" id="time" class="form-control" placeholder="Email" value="<?php echo date('H:i:s'); ?>">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
        </form>
      </div>
    </div>
    <div class="col-md-3 col-md-offset-1 contact-info">
      <div class="contact-item">
        <h4>Contact Info</h4>
        <p><span>Address</span>4321 California St,<br>
          San Francisco, CA 12345</p>
      </div>
      <div class="contact-item">
        <p><span>Phone</span> +1 123 456 1234</p>
      </div>
      <div class="contact-item">
        <p><span>Email</span> info@company.com</p>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; 2017 INNOVA. Design by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
  </div>
</div>
<script type="text/javascript" src="innova_asset/js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="innova_asset/js/bootstrap.js"></script>
<script type="text/javascript" src="innova_asset/js/SmoothScroll.js"></script>
<script type="text/javascript" src="innova_asset/js/nivo-lightbox.js"></script>
<script type="text/javascript" src="innova_asset/js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="innova_asset/js/main.js"></script>
<!-- custom js script  -->
<script type="text/javascript" src="js/my_js.js"></script>
</body>
</html>
