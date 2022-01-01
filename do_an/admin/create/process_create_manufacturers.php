<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$description = $_POST['description'];
	$photo = $_POST['photo'];

	require_once '../../root/connect.php';
	$insert = "insert into manufactures (name,phone,address,description,photo)
				values ('$name','$phone','$address','$description','$photo')";
	mysqli_query($ket_noi,$insert);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=manufacturers');