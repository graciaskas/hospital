<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	
	$test_name=$_POST['test_name'];
	$test_fee=$_POST['test_fee'];
	$status=1;

	$sql_select_verif= mysqli_query($con,"SELECT * FROM tests where  test_name='".$test_name."'");
	$num_rows22 = mysqli_num_rows($sql_select_verif);
	if ($num_rows22 >= 1){
		echo "<script>alert('Test already exist!');</script>";
	} else {

		$files = $_FILES['image'];

		$image_tmp = $files['tmp_name'];
		$image_name = $files['name'];

		
		$file_ext = explode('.', $files['name']);
		$file_ext = strtolower(end($file_ext));	
		$file_name_new = uniqid('Lab-Test-PIC-', true) . '.'  . $file_ext;

			// upload files ...
			if (isset($image_tmp)) {
				# code...
					move_uploaded_file($image_tmp, "../../uploads/test/".$file_name_new);

					$sql=mysqli_query($con,"insert into tests(test_name,test_fee,status,image) values('$test_name','$test_fee','$status','$file_name_new')");
					if($sql)
					{
						echo "<script>alert('Test added Successfully');";
							header('location:test-list.php');
						echo "</script>";
					}
			}
				// ...

	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add Test</title>
    <link rel="icon" href="../../../user_side/img/favicon.png" type="image/png">
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	</head>
	<body>
		<div id="app">		
			<?php include('include/sidebar.php');?>
			<div class="app-content">
			<?php include('include/header.php');?>
									
			<div class="main-content" >
			<div class="wrap-content container" id="container">
		
		
		<!-- start: PAGE TITLE -->
		<section id="page-title">
			<div class="row">
				<div class="col-sm-8">
					<h1 class="mainTitle">Admin | Add Test</h1>
				</div>
				<ol class="breadcrumb">
					<li>
						<span>Admin</span>
					</li>
					<li class="active">
						<span>Add Test</span>
					</li>
				</ol>
			</div>
		</section>


	<div class="container-fluid container-fullw bg-white">
	<div class="row">
	<div class="col-md-12">
	<div class="row margin-top-30">
			<div class="col-lg-8 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
								<h5 class="panel-title">Add Test</h5>
						</div>
						<div class="panel-body">
								<form role="form" name="" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="doctorname">
										Test Name
										</label>
										<input type="text" name="test_name" class="form-control"  placeholder="Enter Patient Name" required="true">
									</div>
									<div class="form-group">
										<label for="doctorname">
										Test Fee (RWF)
										</label>
										<input type="number" name="test_fee" class="form-control"  placeholder="Enter Patient Name" required="true">
									</div>
									<div class="form-group">
										<label for="doctorname">
										Test Image
										</label>
										<input type="file" name="image" class="form-control"  placeholder="Enter Patient Name" required="true">
									</div>

									<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
										Add
									</button>
								</form>
						</div>
					</div>
			</div>
	</div>
	</div>


	<div class="col-lg-12 col-md-12">
			<div class="panel panel-white">
			</div>
	</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>



			<!-- start: FOOTER -->
<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patients | Tests</title>
    <link rel="icon" href="../../../user_side/img/favicon.png" type="image/png">
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				

					<?php include('include/header.php');?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Patients  | Tests</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Patients </span>
									</li>
									<li class="active">
										<span>Tests</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Patient Name</th>
												<th>Test Name</th>
												<th>Verif One</th>
												<th>Verif Two</th>
												<th>Verif Three</th>
												<th>Verif Four</th>
												<th>Test Fee</th>
												<th>Date</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>

										<?php
										$sql=mysqli_query($con,"select doctors.doctorName as docname,users.fullName as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join users on users.id=appointment.userId ");
										$cnt=1;
										while($row=mysqli_fetch_array($sql))
										{
										?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['docname'];?></td>
												<td class="hidden-xs"><?php echo $row['pname'];?></td>
												<td><?php echo $row['doctorSpecialization'];?></td>
												<td><?php echo $row['consultancyFees'];?>$</td>
												<td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?>
												</td>
												<td><?php echo $row['postingDate'];?></td>
												<td>
														<?php if(($row['patientStatus']==1) && ($row['adminStatus']==1))  
															{
																echo "Active";
															}
															if(($row['patientStatus']==0) && ($row['adminStatus']==1))  
															{
																echo "Cancel by Patient";
															}

															if(($row['patientStatus']==1) && ($row['adminStatus']==0))  
															{
																echo "Cancel by Admin";
															}
														?>
												</td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
												<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
													{ 												
													echo "No Action yet";
														} else {
															echo "Canceled";
														}
												?>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
