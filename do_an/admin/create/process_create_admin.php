<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$photo = $_POST['photo'];
	$password = $_POST['password'];
	$access = $_POST['access'];

	require_once '../../root/connect.php';

	$insert = "insert into adm_list (name,phone,address,gender,birthday,email,photo,password,access)
				values ('$name','$phone','$address',b'$gender','$birthday','$email','$photo','$password',b'$access')";
	mysqli_query($ket_noi,$insert);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=admin');
