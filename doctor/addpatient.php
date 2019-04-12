<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$idnumber=$_POST['idnumber'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$gender=$_POST['gender'];
$phoneno=$_POST['phoneno'];
$cancer=$_POST['cancer'];
$prescription=$_POST['prescription'];
$nurse=$_POST['nurse'];
$bloodgroup=$_POST['bloodgroup'];
$email=$_POST['email'];
$address=$_POST['address'];
$password=$_POST['password'];
$query="insert into patient(idnumber,firstName,lastName,gender,phoneno,cancer,prescription,nurse,bloodgroup,email,address,password) values(?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('isssisssssss',$idnumber,$firstName,$lastName,$gender,$phoneno,$cancer,$prescription,$nurse,$bloodgroup,$email,$address,$password);
$stmt->execute();
echo"<script>alert('Patient Succssfully Added');</script>";
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
    
    <title>Admin | Add Patient</title>
    
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
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
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
if(document.patient.password.value!= document.patient.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.patient.cpassword.focus();
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
						<h2 class="page-title">Add Patient</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
	                                        <div class="form-group">
                                                <label class="col-sm-4 control-label"><h4 style="color: green" align="left">Patient Personal Info</h4> </label>
                                            </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Id / Birth Cert No:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="idnumber" id="idnumber"  class="form-control"  >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">First Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="firstName" id="firstName"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Last Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="lastName" id="lastName"  class="form-control" >
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
                                            <label class="col-sm-2 control-label">Phone Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phoneno" id="phoneno"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="email" id="email"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Home Address:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="address" id="address"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><h4 style="color: green" align="left">Medical Info</h4> </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Assign Nurse </label>
                                            <div class="col-sm-8">
                                                <select name="nurse" id="nurse" class="form-control" required> 
                                                    <option value="">Select Nurse</option>
<?php $query ="SELECT * FROM nurse";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
                                                    <option value="<?php echo $row->name;?>"><?php echo $row->name;?>&nbsp;&nbsp;(<?php echo $row->name;?>)</option>
                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Patient Cancer Type</label>
                                            <div class="col-sm-8">
                                                <select name="cancer" id="cancer" class="form-control" required> 
                                                    <option value="">Select Cancer Type</option>
<?php $query ="SELECT * FROM cancer";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
                                                    <option value="<?php echo $row->cancer;?>"><?php echo $row->cancer;?>&nbsp;&nbsp;(<?php echo $row->cancer;?>)</option>
                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Blood Group: </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="bloodgroup" id="bloodgroup" class="form-control" required="required" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Prescribe Medicine</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="prescription" id="prescription"  class="form-control" >
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
                                                <input type="submit" name="submit" Value="Add Patient" class="btn btn-primary">
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
		</div>
	</div>
</body>
</html>