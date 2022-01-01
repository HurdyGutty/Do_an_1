<?php 
$id = $_GET['d'];
require_once '../../root/connect.php';
$qry = "select products_list.*,products_gender.*,products_category.*,manufactures.name as manufacturers_name from products_list join products_gender on products_list.gender_id = products_gender.id join products_category on products_category.id = products_list.category_id  join manufactures on products_list.manufacturers_id = manufactures.id where products_list.id = $id";
$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

echo "<img id='products_photo' src='".$result['photo']."'><br>";
echo "<div>
	Tên sản phẩm: ".$result['name']."<br>";
echo 	"Giới tính: ".$result['gender']."<br>";
echo	"Thể loại: ".$result['category']."<br>";
echo	"Nhà sản xuất: ".$result['manufacturers_name']."<br>";
echo 	"Giá sản phẩm: ".$result['price']."<br>";
echo	"Số lượng: ".$result['quantity']."<br>";
echo 	"<button onclick='fix_page(".$id.")'>Sửa thông tin</button>";
echo 	"</div>";
mysqli_close($ket_noi);