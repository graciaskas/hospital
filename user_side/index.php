<?php
session_start();
try{
    $db = new PDO('mysql:host=localhost;dbname=hms;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('ERREUR: '.$e->getMessage());
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Hospice Lab</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>



    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container">
                <div class="float-left">
                    <ul class="left_side">
                        <li>
                            <a href="../management/hms/user-login.php">
                                <i class="fa fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../management/hms/user-login.php">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../management/hms/user-login.php">
                                <i class="fa fa-dribbble"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../management/hms/user-login.php">
                                <i class="fa fa-behance"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="float-right">
                    <ul class="right_side">
                        <li>
                            <a href="../management/hms/user-login.php">
                                <i class="lnr lnr-phone-handset"></i> +250-780-000-000
                            </a>
                        </li>
                        <li>
                            <a href="#" style="text-transform: lowercase;">
                                <i class="lnr lnr-envelope"></i> emergency@hospice.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php">
                        <img src="img/logo.png" alt=""> Lab
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <div class="row ml-0 w-100">
                            <div class="col-lg-12 pr-0">
                                <ul class="nav navbar-nav center_nav pull-right">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="about.php">About Us</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="services.php">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.php">Contact</a>
                                    </li>
                                    
                                    <?php if(isset($_SESSION['login'])){
                                        ?>
                                        <li class="nav-item submenu dropdown" style="width: 100px;">
                                            <i class="fa fa-user" style="font-size: 15px;"></i>
                                            <a href="#" style="font-size: 15px;" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="accountBtn2">
                                                <?php 
                                                    $query = $db->prepare('SELECT * FROM users WHERE email=:email');
                                                    $query->execute(array(
                                                        'email' => $_SESSION['login']
                                                    ));
                                                    foreach($query as $data_patient){
                                                        #code...
                                                        $fullName = $data_patient['fullname'];
                                                        echo $fullName;
                                                    }
                                                ?> 
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a class="nav-link nav-link2" href="../management/hms/dashboard.php">Detail account</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link nav-link2" href="../management/hms/admin/logout.php">Logout</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        } else {
                                        ?>
                                        <li class="nav-item submenu dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="accountBtn">Account</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../management/hms/user-login.php">Patient</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../management/hms/admin/">Admin</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

    <!--================ Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <h1>We Care for Your Health Every Moment</h1>
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may see some for as low as each.</p>
                        <a class="main_btn mr-10" href="#">get started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->


    <!--================ Start Offered Services Area =================-->
    <section class="service_area section_gap">
        <div class="container">
            <div class="row justify-content-center section-title-wrap">
                <div class="col-lg-12">
                    <h1>Our Coming Services</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                        <span class="lnr lnr-rocket"></span>
                        <a href="#">
                            <h4>24/7 Emergency</h4>
                        </a>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                        <span class="lnr lnr-heart-pulse"></span>
                        <a href="#">
                            <h4>Expert Consultation</h4>
                        </a>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                        <span class="lnr lnr-bug"></span>
                        <a href="#">
                            <h4>Intensive Care</h4>
                        </a>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                        <span class="lnr lnr-users"></span>
                        <a href="#">
                            <h4>Family Planning</h4>
                        </a>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Offered Services Area =================-->

    <!--================ Start separation Area =================-->
    <div>
        <br/><br/><br/><br/>
    </div>
    <!--================ End separation Area =================-->

    <!--================ Start Appointment Area =================-->
    <section class="appointment-area">
        <div class="container">
            <div class="row justify-content-between align-items-center appointment-wrap">
                <div class="col-lg-5 col-md-6 appointment-left">
                    <h1>
                        Servicing Hours
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <ul class="time-list">
                        <li class="d-flex justify-content-between">
                            <span>Monday-Friday</span>
                            <span>08.00 am - 10.00 pm</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Saturday</span>
                            <span>08.00 am - 10.00 pm</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Sunday</span>
                            <span>08.00 am - 10.00 pm</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 pt-60 pb-60">
                    <div class="appointment-right">
                        <div>
                            <br/><br/><br/>
                        </div>
                        <form class="form-wrap" action="#">
                            <h3 class="pb-20 text-center mb-20">Book a Test Now</h3>
                            <div style="text-align: center;">
                                <br/> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, atque. Earum iusto voluptatem provident tempora asperiores et dignissimos quis dicta quos? Optio molestias doloremque iure cum, similique reiciendis
                                culpa non?
                            </div>
                            <div>
                                <br/><br/><br/>
                            </div>
                            <div class="text-center confirm_btn_box">
                                <a class="main_btn text-uppercase" href="services.php">Book a test <i class="lnr lnr-arrow-right"></i></a>
                            </div>
                        </form>
                        <div>
                            <br/><br/><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Appointment Area =================-->

    <!--================ Start separation Area =================-->
    <div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
    <!--================ End separation Area =================-->


    <!--================ start footer Area =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2  col-md-6">
                    <div class="single-footer-widget">
                        <h6>Accounts</h6>
                        <ul class="footer-nav">
                            <li>
                                <a href="../management/hms/user-login.php">Patient Account</a>
                            </li>
                            <li>
                                <a href="../management/hms/doctor/">Doctor Account</a>
                            </li>
                            <li>
                                <a href="../management/hms/admin/">Admin Management</a>
                            </li>
                            <li>
                                <a href="about.php">Or, Vist About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Contact Us</h6>
                        <p>
                            56/8, Rubavu district, Gisenyi town, Down town location, Rwanda in Africa
                        </p>
                        <h3>+250-780-000-019</h3>
                        <h3>+250-780-000-020</h3>
                    </div>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="single-footer-widget newsletter">
                        <h6>Newsletter</h6>
                        <p>You can trust us. we only send promo offers, not a single spam.</p>
                        <div id="mc_embed_signup">
                            <form target="_blank" method="get" class="form-inline">

                                <div class="form-group row">
                                    <div class="col-lg-7 col-md-6 col-sm-12">
                                        <input name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email">
                                    </div>

                                    <div class="col-lg-5 col-md-12">
                                        <button class="nw-btn main_btn circle">Subscrib Now
																					<span class="lnr lnr-arrow-right"></span>
																				</button>
                                    </div>
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | <a href="" target="_blank">201720 - - - _ 201720 - - -</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-dribbble"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area =================-->



    <!--================ Optional JavaScript =================-->
    <!--================ jQuery first, then Popper.js, then Bootstrap JS =================-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/isotope/isotope-min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>