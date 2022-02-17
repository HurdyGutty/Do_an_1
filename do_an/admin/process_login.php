
<?php
require_once '../root/connect.php';

$email = mysqli_real_escape_string($ket_noi,$_POST['email']);
$password = mysqli_real_escape_string($ket_noi,$_POST['password']);
$remember_value = $_POST['remember'] ?? 0;
$remember = mysqli_real_escape_string($ket_noi,$remember_value);

$regex_email = "/^[\w\-\.]+@(?:[\w-]+\.)+[\w-]{2,4}$/";
$regex_password = "/^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/";
$hasspass = password_hash($password, PASSWORD_DEFAULT);
$key_array = array("email"=>$email,"hasspass"=>$hasspass,"remember"=>$remember);
$key_string = serialize($key_array);
if (preg_match($regex_email, $email) == 1 && preg_match($regex_password, $password) == 1){

$sql = "select * from adm_list 
where email = '$email' and  password = '$password'";

$result = mysqli_query($ket_noi,$sql);
if(mysqli_num_rows($result) == 1){
	$each = mysqli_fetch_array($result);
	$info_array = array("id"=>$each['id'],"name"=>$each['name'],"access"=>$each['access']);
	$info_string = serialize($info_array);
	$encrypted_info = openssl_encrypt($info_string,"AES-128-ECB",$key_string);
	$encrypted_key = openssl_encrypt($key_string,"AES-128-ECB",$encrypted_info);
	$encrypted_info_2 = openssl_encrypt($encrypted_info,"AES-128-ECB",$encrypted_key);
	$cookie_value = array($encrypted_key,$encrypted_info_2);
	$cookie_array = serialize($cookie_value);
	session_start();
	$_SESSION['id'] = $each['id'];
	$_SESSION['name'] = $each['name'];
	$_SESSION['access'] = $each['access'];
	if (!empty($remember)){
		setcookie('remember', $cookie_array, time() + (86400*30));
	}
	header('location:admin_view.php');
	exit();
}
mysqli_close($ket_noi);
// header('location:admin_view.php');
} else {
	echo "<script type='text/javascript'>alert('Không thành công');</script>";
	sleep(5);
	mysqli_close($ket_noi);
	header('location:logout.php');
}
