<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select products_list.*,products_gender.*,products_category.*,manufactures.name as manufacturers_name from products_list join products_gender on products_list.gender_id = products_gender.id join products_category on products_category.id = products_list.category_id  join manufactures on products_list.manufacturers_id = manufactures.id where products_list.id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

	$gender_sql = "select * from products_gender";
	$gender = mysqli_query($ket_noi,$gender_sql);

	$category_sql = "select * from products_category";
	$category = mysqli_query($ket_noi,$category_sql);

	$manufactures_sql = "select * from manufactures";
	$manufactures = mysqli_query($ket_noi,$manufactures_sql);

echo "<img id='products_photo' src='".$result['photo']."'><br>";
echo "<form method=\"post\" action=\"update/product_update.php\">
		<input type='hidden' name='id' value='".$id."'>
	Tên sản phẩm: <input type='text' name='name' value='".$result['name']."'><br>";

echo 	"Giới tính: ";
echo "<select name=\"gender\">";
foreach ($gender as $gender_each) {
echo 	"<option";
if ($gender_each['id'] == $result['gender_id']){echo " selected";}
echo	">".$gender_each['id']." - ".$gender_each['gender']."</option>";
}
echo "</select>";
echo "<br>";

echo	"Thể loại: ";
echo "<select name=\"category\">";
foreach ($category as $category_each) {
echo 	"<option";
if ($category_each['id'] == $result['category_id']){echo " selected";}
echo	">".$category_each['id']." - ".$category_each['category']."</option>";
}
echo "</select>";
echo 	"<br>";

echo	"Nhà sản xuất: ";
echo "<select name=\"manufactures\">";
foreach ($manufactures as $manufactures_each) {
echo 	"<option";
if ($manufactures_each['id'] == $result['manufacturers_id']){echo " selected";}
echo	">".$manufactures_each['id']." - ".$manufactures_each['name']."</option>";
}
echo "</select>";
echo 	"<br>";

echo 	"Giá sản phẩm: <input type='text' name='price' value='".$result['price']."'><br>";
echo	"Số lượng: <input type='text' name='quantity' value='".$result['quantity']."'><br>";
echo 	"Mô tả: <textarea name='description' value='".$result['description']."'></textarea><br>";
echo "<button type=\"submit\">Sửa thông tin</button>";
echo 	"</form>";
mysqli_close($ket_noi);