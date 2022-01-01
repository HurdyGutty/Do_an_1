<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from manufactures where id = '$id'";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

echo "<img id='manufactures_photo' src='".$result['photo']."'><br>";
echo "<form method=\"post\" action=\"update/manufactures_update.php\">
		<input type='hidden' name='id' value='".$id."'>
Tên nhà sản xuất: <input type='text' name='name' value='".$result['name']."'><br>";
echo "Số điện thoại: <input type='text' name='phone' value='".$result['phone']."'><br>";
echo "Địa chỉ: <input type='text' name='address' value='".$result['address']."'><br>";
echo "Mô tả: <textarea name='description' value='".$result['description']."'></textarea><br>";
echo "<button type=\"submit\">Sửa thông tin</button>";
echo "</form>";

mysqli_close($ket_noi);