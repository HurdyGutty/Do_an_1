<?php
	$name = strip_tags($_POST['name']);
	$phone = strip_tags($_POST['phone']);
	$address = strip_tags($_POST['address']);
	$description = strip_tags($_POST['description']);
	$photo = strip_tags($_POST['photo']);

$regex_name = "/^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,8}$/";
$regex_phone = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
$regex_address = "/^(?:Tỉnh|Thành phố) [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zyàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,3}$/";




	require_once '../../root/connect.php';

	if (preg_match($regex_name, $name) == 1 && preg_match($regex_phone, $phone) == 1 && preg_match($regex_address, $address) == 1){
	$insert = "insert into manufactures (name,phone,address,description,photo)
				values ('$name','$phone','$address','$description','$photo')";
	mysqli_query($ket_noi,$insert);
}
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=manufacturers');
