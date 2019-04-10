<?php
$servername="localhost";
$username="root";
$password="";
$dbname="doctor";
$errors = array();

//create connection to database
$dbc=new mysqli($servername,$username,$password,$dbname);

//check connection to database
if($dbc->connect_error){
	die("connection Failed" . $dbc->connect_error);
	echo "Connection Failed";
}else{
}
?>