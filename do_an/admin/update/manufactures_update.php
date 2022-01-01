<?php
	$id = $_POST['id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$description = $_POST['description'];

	require_once '../../root/connect.php';

	$update_sql = "update manufactures set 
	name = '$name',
	 phone = '$phone', 
	 address = '$address',
	  description = '$description'
	   where id = '$id'";

	mysqli_query($ket_noi,$update_sql);
	mysqli_close($ket_noi);
	header("location:../admin_view.php?link=manufacturers");