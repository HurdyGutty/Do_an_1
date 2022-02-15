<?php 
require_once '../../root/connect.php';
$id = mysqli_real_escape_string($ket_noi,$_POST['id']);
$name = mysqli_real_escape_string($ket_noi,$_POST['name']);
$gender_id = mysqli_real_escape_string($ket_noi,$_POST['gender']);
$category_id = mysqli_real_escape_string($ket_noi,$_POST['category']);
$manufacturers_id = mysqli_real_escape_string($ket_noi,$_POST['manufactures']);
$price = (int)(mysqli_real_escape_string($ket_noi,$_POST['price']));
$quantity = (int)(mysqli_real_escape_string($ket_noi,$_POST['quantity']));
$description = mysqli_real_escape_string($ket_noi,$_POST['description']);

$regex_name = "/^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [\w\(\)\-\[\]\.\,]{0,15}){0,10}$/";

if (preg_match($regex_name, $name) == 1 && $price > 0 && $quantity > 0) {
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
} 
	mysqli_close($ket_noi);
	header("location:../admin_view.php?link=product");