<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for adding nurse
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$gender=$_POST['gender'];
$phoneno=$_POST['phoneno'];
$email=$_POST['email'];
$password=$_POST['password'];
$query="insert into doctor(name,gender,phoneno,email,password) values(?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssiss',$name,$gender,$phoneno,$email,$password);
$stmt->execute();
echo"<script>alert('Doctor Succssfully Registered');</script>";
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

	<title>Admin | Add Doctor</title>
	
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
    <script type="text/javascript">
function valid()
{
if(document.doctor.password.value!= document.doctor.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.doctor.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
    					<h2 class="page-title">Add Doctor</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add Doctor</div>
									<div class="panel-body">
									<form method="post" action="" name="nurse" class="form-horizontal" onSubmit="return valid();">
										<div class="form-group">
                                            <label class="col-sm-2 control-label"> Full Name of Doctor: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="name" id="name"  class="form-control" required="required" >
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Gender : </label>
                                            <div class="col-sm-8">
                                                <select name="gender" class="form-control" required="required">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Phone Number: </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phoneno" id="phoneno"  class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Email Address: </label>
                                            <div class="col-sm-8">
                                                <input type="email" name="email" id="email"  class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Password: </label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password" id="password"  class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Confirm Password : </label>
                                            <div class="col-sm-8">
                                                <input type="password" name="cpassword" id="cpassword"  class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <button class="btn btn-default" type="submit">Cancel</button>
                                            <input type="submit" name="submit" Value="Register" class="btn btn-primary">
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