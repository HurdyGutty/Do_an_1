<?php
	require_once '../../root/connect.php';
	$id = mysqli_real_escape_string($ket_noi,$_GET['d']);
	
	$qry = "select * from adm_list where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

session_start();
if ($_SESSION['access'] == 1){
echo 	"<div id='info_page'>";
echo 	"<img id='adm_photo' src=\"".$result['photo']."\">";
echo 	"<form method=\"post\" action=\"update/admin_update.php\" id='fix_info'>
			<input type='hidden' name='id' value='".$id."' style=\"display: none;\">
			<label>Tên nhân viên: </label>
			<div>
			<input type='text' name='name' value='".$result['name']."'>
			<div class=\"name_error\"></div>
			</div>";
echo	"<label>Giới tính: </label>";
echo 	"<select name='gender'>";
if ($result['gender'] == 1){
	echo "<option selected>Nam</option><option>Nữ</option>";
} else {
	echo "<option>Nam</option><option selected>Nữ</option>";
}
echo "</select>";
echo "<label>Số điện thoại: </label>
		<div>
		<input type='text' name='phone' value='".$result['phone']."'>
		<div class=\"phone_error\"></div>
		</div>";
echo	"<label>Địa chỉ: </label>
		<div>
		<input type='text' name='address' value='".$result['address']."'>
		<div class=\"address_error\"></div>
		</div>";
echo	"<label>Sinh nhật: </label>
		<input type='text' name='birthday' value='".$result['birthday']."'>";
echo "<button type='submit' class='submit_form'>Sửa thông tin</button>";
echo "</form>";
echo "</div>";
} else{
	header('location:logout.php');
}
mysqli_close($ket_noi);