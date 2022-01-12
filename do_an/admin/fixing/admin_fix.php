<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from adm_list where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

session_start();
if ($_SESSION['access'] == 1){
echo 	"<div id='info_page'>";
echo 	"<img id='adm_photo' src=\"".$result['photo']."\">";
echo 	"<form method=\"post\" action=\"update/admin_update.php\" id='fix_info'>
			<input type='hidden' name='id' value='".$id."' style='display:none;'>
			<p>Tên nhân viên: </p><input type='text' name='admin_name' value='".$result['name']."'>";
echo	"<p>Giới tính: <p>";
echo 	"<select name='gender'>";
if ($result['gender'] == 1){
	echo "<option selected>Nam</option><option>Nữ</option>";
} else {
	echo "<option>Nam</option><option selected>Nữ</option>";
}
echo "</select>";
echo "<p>Số điện thoại: </p><input type='text' name='phone' value='".$result['phone']."'>";
echo	"<p>Địa chỉ: </p><input type='text' name='address' value='".$result['address']."'>";
echo	"<p>Sinh nhật: </p><input type='text' name='birthday' value='".$result['birthday']."'>";
echo "<button type='submit'>Sửa thông tin</button>";
echo "</form>";
echo "</div>";
} else{
	header('location:logout.php');
}
mysqli_close($ket_noi);