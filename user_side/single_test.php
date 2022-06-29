<?php
include_once('../management/hms/include/config.php');
session_start();
try{
    $db = new PDO('mysql:host=localhost;dbname=hms;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('ERREUR: '.$e->getMessage());
}

if(!isset($_SESSION['login'])){
    $test_id = $_GET['test_id'];
    $host=$_SERVER['HTTP_HOST'];
    $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    $filename= "single_test.php";

    header('location:../management/hms/user-login.php?gethost='.$host.'&geturi='.$uri.'&getfilename='.$filename.'&test_id='.$test_id.'');
}

if(isset($_GET['getverif']) && $_GET['getverif'] == "verified"){
    echo '<script>alert("You loggedin successfully as \''.$_SESSION['fullname'].'\'");</script>';
}

if(isset($_POST['submit'])){
    $queryUserDetail = $db->prepare('SELECT * FROM users WHERE email=:email');
    $queryUserDetail->execute(array(
        'email' => $_SESSION['login']
    ));
    foreach($queryUserDetail as $data_patient){
        #code...
        $patientId = $data_patient['id'];
        $fullName = $data_patient['fullname'];
    }

    $query_test = $db->prepare('SELECT * FROM tests WHERE id=:id');
    $query_test->execute(array(
        'id' => $_GET['test_id']
    ));
    foreach($query_test as $data_test){
        #code...
        $testName = $data_test['test_name'];
        $test_fee = $data_test['test_fee'];
    }


    $sn1=$_POST['sn1'];
    $sn2=$_POST['sn2'];
    $sn3=$_POST['sn3'];
    $description=$_POST['description'];

    $query=mysqli_query($con,"insert into booked_test(patient_name,patientId,test_name,verif_one,verif_two,verif_three,description,test_fee,status,result) values('$fullName','$patientId','$testName','$sn1','$sn2','$sn3','$description','$test_fee',1,'waiting')");
    if($query){
        echo "<script>alert('Successfully Booked');</script>";
    }
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
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">About Us</a>
                                    </li>
                                    <li class="nav-item active">
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

    <!--================ Banner Area =================-->
    <section class="banner_area">
				<div class="banner_inner d-flex align-items-center" style="background: url('img/KFT.jpg');">
					<div style="width: 100%;height: 100%; background: #0e2531b0; position: absolute;">
            <div class="container">
                <div class="banner_content text-left" style="padding-top: 140px;">
                    <h2>
                    <?php 
                        $query_test = $db->prepare('SELECT * FROM tests WHERE id=:id');
                        $query_test->execute(array(
                            'id' => $_GET['test_id']
                        ));
                        foreach($query_test as $data_test){
                            #code...
                            $testName = $data_test['test_name'];
                            echo $testName;
                        }
                    ?> 
                    </h2>
                    <div class="page_link">
                        <a href="index.php">Home</a>
                        <a href="services.php">Services</a>
                        <a href="single_test.php"><?php echo $testName; ?></a>
                    </div>
                </div>
						</div>
					</div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area p_120">
        <div class="container">
            <div class="row justify-content-center section-title-wrap">
                <div class="col-lg-12">
                    <h1>Fill Out The Test Form Below</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <form class="row contact_form" name="contactus" method="post">
                        <div class="col-md-8">
                            <div class="form-group" id="form_group">
																<label>Semptom n 1</label>
                                <input type="text" class="form-control" id="name" name="sn1" placeholder="Enter semptom n1">
                            </div>
                            <div class="form-group" id="form_group">
																<label>Semptom n 2</label>
                                <input type="text" class="form-control" id="email" name="sn2" placeholder="Enter semptom n2">
                            </div>
                            <div class="form-group" id="form_group">
																<label>Semptom n 3</label>
                                <input type="text" class="form-control" id="subject" name="sn3" placeholder="Enter semptom n3">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="form_group">
																<label>Describe your feeling</label>
                                <textarea class="form-control" name="description" id="message" rows="1" style="height: 227px;" placeholder="Enter the description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" name="submit" class="btn submit_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->

		<style>
			#form_group{
				margin-bottom: 25px;
			}
		</style>
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