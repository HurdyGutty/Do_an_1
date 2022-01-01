<?php 
	$id = $_POST['id'];
	$name = $_POST['admin_name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$gender = $_POST['gender'] === 'Nam' ? 1 : 0;
	$birthday = $_POST['birthday'];

	require_once '../../root/connect.php';
	$update_sql = "update adm_list 
	set 
	name = '$name', 
	phone = '$phone', 
	address = '$address', 
	gender = b'$gender', 
	birthday = '$birthday' 
	where id = '$id'";

	mysqli_query($ket_noi,$update_sql);
	mysqli_close($ket_noi);
	header("location:../admin_view.php?link=admin");