<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from adm_list where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

if($result['access'] == 1){
	echo "<div class = 'denied_page'>";
	echo '<h1>Bạn không có quyền truy cập hồ sơ này</h1><br>';
	echo "<button onclick='reload_page()'>Quay lại</button>" ;
	echo "</div>";
} else {
echo 	"<div id='info_page'>";
echo 	"<img id='adm_photo' src=\"".$result['photo']."\">";
echo 	"<div id='detail_info'>
			<p>Tên nhân viên: ".$result['name']."</p>";
echo	"<p>Giới tính: ";
if ($result['gender'] == 1){
	echo "Nam";
} else {
	echo "Nữ";
}
echo  "</p>";
echo "<p>Số điện thoại: ".$result['phone']."</p>";
echo	"<p>Địa chỉ: ".$result['address']."</p>";
echo	"<p>Sinh nhật: ".$result['birthday']."</p>";
echo "<button onclick=\"fix_page(".$id.")\">Sửa thông tin</button>";
echo "</div>";
echo "</div>";
}
mysqli_close($ket_noi);