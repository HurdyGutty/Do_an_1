<?php
	$name = strip_tags($_POST['name']);
	$gender = strip_tags($_POST['gender']);
	$category = strip_tags($_POST['category']);
	$manufactures = strip_tags($_POST['manufactures']);
	$price = strip_tags($_POST['price']);
	$quantity = strip_tags($_POST['quantity']);
	$description = strip_tags($_POST['description']);
	$photo = strip_tags($_POST['photo']);

	require_once '../../root/connect.php';

	
	$insert = "insert into products_list (name,gender_id,category_id,manufacturers_id,price,quantity,description,photo)
				values ('$name','$gender','$category','$manufactures','$price','$quantity','$description','$photo')";
	mysqli_query($ket_noi,$insert);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=product');