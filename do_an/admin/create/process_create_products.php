<?php
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$category = $_POST['category'];
	$manufactures = $_POST['manufactures'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	$photo = $_POST['photo'];

	require_once '../../root/connect.php';
	$insert = "insert into products_list (name,gender_id,category_id,manufacturers_id,price,quantity,description,photo)
				values ('$name','$gender','$category','$manufactures','$price','$quantity','$description','$photo')";
	mysqli_query($ket_noi,$insert);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=product');