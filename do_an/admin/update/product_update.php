<?php 
	$id = $_POST['id'];
	$name = $_POST['name'];
	$gender_id = substr($_POST['gender'],0,1);
	$category_id = substr($_POST['category'],0,1);
	$manufacturers_id = substr($_POST['manufactures'],0,1);
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];

	require_once '../../root/connect.php';
	$update_sql = "update products_list 
	set 
	name = '$name', 
	gender_id = '$gender_id', 
	category_id = '$category_id', 
	manufacturers_id = '$manufacturers_id', 
	price = '$price',
	quantity = '$quantity', 
	description = '$description'
	where id = '$id'";

	mysqli_query($ket_noi,$update_sql);
	mysqli_close($ket_noi);
	header("location:../admin_view.php?link=product");
