<?php
	require_once '../../root/connect.php';
	$id = mysqli_real_escape_string($ket_noi,$_GET['d']);

	$qry = "select products_list.*,products_gender.*,products_category.*,manufactures.name as manufacturers_name from products_list join products_gender on products_list.gender_id = products_gender.id join products_category on products_category.id = products_list.category_id  join manufactures on products_list.manufacturers_id = manufactures.id where products_list.id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

	$gender_sql = "select * from products_gender";
	$gender = mysqli_query($ket_noi,$gender_sql);

	$category_sql = "select * from products_category";
	$category = mysqli_query($ket_noi,$category_sql);

	$manufactures_sql = "select * from manufactures";
	$manufactures = mysqli_query($ket_noi,$manufactures_sql);

echo "<div id='fixing_page'>";
echo 	"<img id='products_fix_photo' src='".$result['photo']."'>";
echo 	"<form method=\"post\" action=\"update/product_update.php\" id='product_fix'>
			<input type='hidden' name='id' value='".$id."' style=\"display: none;\">
			<label>Tên sản phẩm: </label>
			<div>
				<input type='text' name='name' value='".$result['name']."' size='26'>
				<div class=\"name_error\"></div>
			</div>";

echo 	"<label>Giới tính: </label>";
echo 	"<select name=\"gender\">";
	foreach ($gender as $gender_each) {
echo 		"<option value = \"".$gender_each['id']."\"";
	if ($gender_each['id'] == $result['gender_id']){echo " selected";}
echo		">".$gender_each['gender']."</option>";
	}
echo 	"</select>";

echo	"<label>Thể loại: </label>";
echo 	"<select name=\"category\">";
	foreach ($category as $category_each) {
echo 	"<option value = \"".$category_each['id']."\"";
	if ($category_each['id'] == $result['category_id']){echo " selected";}
echo	">".$category_each['category']."</option>";
	}
echo "</select>";

echo	"<label>Nhà sản xuất: </label>";
echo 	"<select name=\"manufactures\">";
	foreach ($manufactures as $manufactures_each) {
echo 	"<option value = \"".$manufactures_each['id']."\"";
	if ($manufactures_each['id'] == $result['manufacturers_id']){echo " selected";}
echo	">".$manufactures_each['name']."</option>";
	}
echo "</select>";

echo 	"<label>Giá sản phẩm: </label>
		<div>
			<input type='text' name='price' value='".$result['price']."' size='26'>
			<div class=\"price_error\"></div>
		</div>";
echo	"<label>Số lượng: </label>
		<div>
			<input type='text' name='quantity' value='".$result['quantity']."' size='26'>
			<div class=\"quantity_error\"></div>
		</div>";
echo 	"<label>Mô tả: </label>
		<div>
			<textarea name='description'>".$result['description']."</textarea>
		</div>";
echo 	"<button type=\"submit\">Sửa thông tin</button>";
echo 	"</form>";
echo "</div>";
mysqli_close($ket_noi);