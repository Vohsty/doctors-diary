<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
if($_POST['submit'])
{
$name=$_POST['name'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$id=$_GET['id'];
$query="update nurse set name=?,email=?,phoneno=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssi',$name,$email,$phoneno,$id);
$stmt->execute();
echo"<script>alert('Nurse Details have been Updated successfully');</script>";
}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
    <title>Admin | Edit Nurse</title>
	
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
    				<div class="col-md-12">
						<h2 class="page-title">Edit Nurse</h2>
						<div class="row">
	    					<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Nurse</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
												<?php	
												$id=$_GET['id'];
	$ret="select * from nurse where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
						<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-8">
					<input type="text"  name="name" value="<?php echo $row->name;?>"  class="form-control"> </div>
					</div>
				 <div class="form-group">
				<label class="col-sm-2 control-label">Email Address</label>
		<div class="col-sm-8">
	<input type="text" class="form-control" name="email" value="<?php echo $row->email;?>" required="required">
						 </div>
						</div>
<div class="form-group">
									<label class="col-sm-2 control-label">Phone Number</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="phoneno" value="<?php echo $row->phoneno;?>" >
												</div>
											</div>


<?php } ?>
												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Update Nurse">
												</div>
											</div>

										</form>

									</div>
								</div>
									
							
							</div>
						
									
							

							</div>
						</div>

					</div>
				</div> 	
				

			</div>
		</div>
	</div>

</body>

</html>