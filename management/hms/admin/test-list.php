<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"update tests set status=0 where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data desactivated !!";
			}
			
if(isset($_GET['activate']))
{
				mysqli_query($con,"update tests set status=1 where id = '".$_GET['activate_id']."'");
						$_SESSION['msg2']="Test activated !!";
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Tests</title>
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
									<h1 class="mainTitle">Admin  | View Tests</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin </span>
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

									<p style="color:red;">
										<?php echo htmlentities($_SESSION['msg']);?>
										<?php echo htmlentities($_SESSION['msg']="");?>
									</p>	
									<p style="color:#24de6f;">
										<?php echo htmlentities($_SESSION['msg2']);?>
										<?php echo htmlentities($_SESSION['msg2']="");?>
									</p>	

									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Test Name</th>
												<th>Test Fee</th>
												<th>Image</th>
												<th>Added Date</th>
												<th>Current Status</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
										<?php
										$query_test = $db->prepare('SELECT * FROM tests ORDER BY ID DESC');
										$query_test->execute();
										$cnt=1;
										foreach($query_test as $test_data){
												#code...
												if ($test_data['status'] == 1){

										?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td><?php echo $test_data['test_name'];?></td>
												<td><?php echo $test_data['test_fee'];?>$</td>
												<td><?php echo $test_data['image'];?></td>
												<td><?php echo $test_data['date_test'];?></td>
												<td><p style="color:#24de6f;">Active</p></td>
												
												<td >
													<div>
														<a href="test-list.php?id=<?php echo $test_data['ID']?>&del=delete" onClick="return confirm('Are you sure you want to desactivate(Test: <?php echo  $test_data['test_name'] ?>)?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-close"></i></a>
													</div>
												</td>
											</tr>
											
											<?php 
												} else{
													?>

											<style>
												#idTd{
													color: #ddd !important;
												}
											</style>
												<tr>
												<td id="idTd" class="center"><?php echo $cnt;?>.</td>
												<td id="idTd"><?php echo $test_data['test_name'];?></td>
												<td id="idTd"><?php echo $test_data['test_fee'];?>$</td>
												<td id="idTd"><?php echo $test_data['image'];?></td>
												<td id="idTd"><?php echo $test_data['date_test'];?></td>
												<td><p style="color:#fb000042">Inactive</p></td>
												<td >
													<div>
														<a  href="test-list.php?activate_id=<?php echo $test_data['ID']?>&activate=activate_test" onClick="return confirm('Are you sure you want to activate(Test: <?php echo  $test_data['test_name'] ?>)?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-unlock"></i></a>
													</div>
												</td>
											</tr>

													<?php
												}
											$cnt=$cnt+1;
											}
											?> 
											
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
