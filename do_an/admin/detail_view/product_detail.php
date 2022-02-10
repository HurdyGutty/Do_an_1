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

$qry_date = "select DATE(out_list.order_time) as date, quantity from out_product left join out_list on out_product.out_id = out_list.id where out_product.product_id = '$id' && datediff(NOW(),out_list.order_time) >= 0 && datediff(NOW(),out_list.order_time) < ? ORDER BY date DESC";

$stmt_week = $ket_noi->prepare($qry_date);
$stmt_week->bind_param('i',$week);
$week = 7;
$stmt_week->execute();
$result_week = $stmt_week->get_result();
$data_week = $result_week->fetch_all(MYSQLI_ASSOC);

function date_array(int $n) {
	$current_time = time();
	$date_counter = array();
	for ($i = 0; $i < $n; $i++){
		$date_counter[date("Y-m-d",($current_time - $i*24*60*60))] = 0;
	}
	return $date_counter;
}

$week_counter = date_array(7);

foreach ($data_week as $x => $arr) {
	if(array_search($arr['date'],array_keys($week_counter)) != false){
		$week_counter[$arr['date']] = $arr['quantity'];
	}	
}


$month_counter = date_array(30);

$stmt_month = $ket_noi->prepare($qry_date);
$stmt_month->bind_param('i',$month);
$month = 30;
$stmt_month->execute();
$result_month = $stmt_month->get_result();
$data_month = $result_month->fetch_all(MYSQLI_ASSOC);


foreach ($data_month as $x => $arr) {
	if(array_search($arr['date'],array_keys($month_counter)) != false){
		$month_counter[$arr['date']] = $arr['quantity'];
	}	
}
function date_formatting(array $arr){
	$arr_key_replace = array();
		foreach ($arr as $x => $value) {
			$arr_key_replace[$x] = date("d/m/Y", strtotime($x));
		}
	$arr_formatted =	array_combine(array_merge($arr, $arr_key_replace), $arr);
		return $arr_formatted;
}

echo 	"<div id='products_right_detail_panel'>";
echo 		"<div class='div_graph'><canvas id=\"product_week_chart\" style=\"width:100%;height:100%;max-height:39vh\"></div>";
echo 		"<div class='div_graph'><canvas id=\"product_month_chart\" style=\"width:100%;height:100%;max-height:39vh\"></div>";
echo 	"</div>";


echo "</div>";

echo "<script type=\"text/javascript\" id='product_graph_data'>";


		$product_x_week = json_encode(array_keys(date_formatting($week_counter)));
		$product_y_week = json_encode(array_values($week_counter));
echo 	"var x_product_week = " .$product_x_week. ";\n";
echo 	"var y_product_week = " .$product_x_week. ";\n";
		$product_x_month = json_encode(array_keys(date_formatting($month_counter)));
		$product_y_month = json_encode(array_values($month_counter));
echo 	"var x_product_month = " .$product_x_month. ";\n";
echo 	"var y_product_month = " .$product_y_month. ";\n";
echo "</script>";
mysqli_close($ket_noi);