<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from manufactures where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

echo "<img id='manufactures_photo' src='".$result['photo']."'><br>";
echo "<div>
Tên nhà sản xuất: ".$result['name']."<br>";
echo "Số điện thoại: ".$result['phone']."<br>";
echo "Địa chỉ: ".$result['address']."<br>";
echo "Mô tả: ".$result['description']."<br>";
echo "<button onclick=\"fix_page(".$id.")\">Sửa thông tin</button>";
echo "</div>";
mysqli_close($ket_noi);