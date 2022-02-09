<?php 
$id = $_GET['d'];
require_once '../../root/connect.php';
$qry = "select products_list.*,products_gender.*,products_category.*,manufactures.name as manufacturers_name from products_list join products_gender on products_list.gender_id = products_gender.id join products_category on products_category.id = products_list.category_id  join manufactures on products_list.manufacturers_id = manufactures.id where products_list.id = $id";
$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));


echo "<div id='manu_info'>";
echo 	"<div id= 'product_info_column'>";
echo 			"<img id='products_info_photo' src='".$result['photo']."'>";
echo 			"<div id='products_info_detail'>
					<h3>".$result['name']."</h3>";
echo 				"<label>Giới tính: </label><span>".$result['gender']."</span>";
echo				"<label>Thể loại: </label><span>".$result['category']."</span>";
echo				"<label>Nhà sản xuất: </label><span>".$result['manufacturers_name']."</span>";
echo 				"<label>Giá sản phẩm: </label><span>".$result['price']."</span>";
echo				"<label>Số lượng: </label><span>".$result['quantity']."</span>";
echo 				"<label>Mô tả: </label><span>".$result['description']."</span>";
echo 				"<button onclick='fix_page(".$id.")'>Sửa thông tin</button>";
echo 			"</div>";
echo 	"</div>";





echo "</div>";
mysqli_close($ket_noi);