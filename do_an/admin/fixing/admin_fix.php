<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from adm_list where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

session_start();
if ($_SESSION['access'] == 1){
echo 	"<img id='adm_photo' src=\"".$result['photo']."\"><br>";
echo 	"<form method=\"post\" action=\"update/admin_update.php\">
			<input type='hidden' name='id' value='".$id."' >
			Tên nhân viên: <input type='text' name='admin_name' value='".$result['name']."'><br>";
echo	"Giới tính: ";
echo 	"<select name='gender'>";
if ($result['gender'] == 1){
	echo "<option selected>Nam</option><option>Nữ</option>";
} else {
	echo "<option>Nam</option><option selected>Nữ</option>";
}
echo "</select>";
echo  "<br>";
echo "Số điện thoại: <input type='text' name='phone' value='".$result['phone']."'><br>";
echo	"Địa chỉ: <input type='text' name='address' value='".$result['address']."'><br>";
echo	"Sinh nhật: <input type='text' name='birthday' value='".$result['birthday']."'><br>";
echo "<button type='submit'>Sửa thông tin</button>";
echo "</form>";
} else{
	header('location:logout.php');
}
mysqli_close($ket_noi);