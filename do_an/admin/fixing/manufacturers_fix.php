<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from manufactures where id = '$id'";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

echo "<div id='fixing_page'>";
echo "<img id='manufactures_info_photo' src='".$result['photo']."'>";
echo "<form method=\"post\" action=\"update/manufactures_update.php\" id = \"manufactures_fix\">
		<input type='hidden' name='id' value='".$id."' style=\"display: none;\">
<label> Tên nhà sản xuất: </label>
<div>
<input type='text' name='name' value='".$result['name']."' size='26'>
<div class=\"name_error\"></div>
</div>";
echo "<label>Số điện thoại: </label>
<div>
<input type='text' name='phone' value='".$result['phone']."' size='26'>
<div class=\"phone_error\"></div>
</div>";
echo "<label>Địa chỉ: </label>
<div>
<input type='text' name='address' value='".$result['address']."' size='26'>
<div class=\"address_error\"></div>
</div>";
echo "<label>Mô tả: </label>
<textarea name='description' value='".$result['description']."'></textarea>";
echo "<button type=\"submit\" class='submit_form'>Sửa thông tin</button>";
echo "</form>";
echo "</div>";

mysqli_close($ket_noi);