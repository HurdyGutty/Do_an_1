
<?php

$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);

$regex_email = "/^[\w\-\.]+@(?:[\w-]+\.)+[\w-]{2,4}$/";
$regex_password = "/^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/";
require_once '../root/connect.php';

if (preg_match($regex_email, $email) == 1 && preg_match($regex_password, $password) == 1){

$sql = "select * from adm_list 
where email = '$email' and  password = '$password'";

$result = mysqli_query($ket_noi,$sql);
if(mysqli_num_rows($result) == 1){
	$each = mysqli_fetch_array($result);
	session_start();
	$_SESSION['id'] = $each['id'];
	$_SESSION['name'] = $each['name'];
	$_SESSION['access'] = $each['access'];
	header('location:admin_view.php');
	exit();
}
header('location:admin_view.php');
} else {
	echo "<script type='text/javascript'>alert('Không thành công');</script>";
	sleep(5);
	header('location:logout.php');
}
