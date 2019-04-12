<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
if($_POST['submit'])
{
$prescription=$_POST['prescription'];
$bloodgroup=$_POST['bloodgroup'];
$id=$_GET['id'];
$query="update patient set prescription=?,bloodgroup=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssi',$prescription,$bloodgroup,$id);
$stmt->execute();
echo"<script>alert('Patient Details have been Updated successfully');</script>";
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
	
    <title>Admin | Edit Patient</title>
	
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
						<h2 class="page-title"> Profile</h2>
	<?php	
$aid=$_SESSION['id'];
	$ret="select * from patient where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Patient Profile details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
                                        
				 <div class="form-group">
				<label class="col-sm-2 control-label">Prescription</label>
		<div class="col-sm-8">
	<input type="text" class="form-control" name="prescription" value="<?php echo $row->prescription;?>" required="required">
						 </div>
						</div>

                                            <div class="form-group">
									<label class="col-sm-2 control-label">Blood Group</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="bloodgroup" value="<?php echo $row->bloodgroup;?>" >
												</div>
											</div>


<?php } ?>
												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Update patient">
												</div>
											</div> 
										</form>
									</div>
								</div>
			</div></div>
		</div></div>
		</div></div>
		</div></div> 	
		</div></div>
	</div>	
</body>
</html>
