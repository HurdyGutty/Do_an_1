<?php
	require_once '../../root/connect.php';
	$id = mysqli_real_escape_string($ket_noi,$_GET['d']);
	
	$qry = "select * from manufactures where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

echo "<div id='manu_info'>";
echo 	"<div id= 'manu_info_column'>";
echo 		"<img id='manufactures_info_photo' src='".$result['photo']."'>";
echo 		"<div id='manufactures_info_detail'><h1>".$result['name']."</h1>";
echo 				"<label>Số điện thoại: </label><span>".$result['phone']."</span>";
echo 				"<label>Địa chỉ: </label><span>".$result['address']."</span>";
echo 				"<label>Mô tả: </label><span>".$result['description']."</span>";
echo 				"<button onclick=\"fix_page(".$id.")\">Sửa thông tin</button>";
echo 		"</div>";
echo 	"</div>";

	$order_by = "number_month";

	$qry_list = "select t3.product_id, t3.name, COALESCE(t1.number, 0) AS number_week, COALESCE(t2.number, 0) AS number_month
					from
						(select out_product.product_id,products_list.name,count(out_product.product_id) as number from out_product left join products_list on out_product.product_id = products_list.id left join manufactures on products_list.manufacturers_id = manufactures.id left join out_list on out_list.id = out_product.out_id where manufactures.id = '$id' && datediff(NOW(),out_list.order_time) >= 0 && datediff(NOW(),out_list.order_time) <= ? group by out_product.product_id) t1 
					right join
						(select out_product.product_id,products_list.name,count(out_product.product_id) as number from out_product left join products_list on out_product.product_id = products_list.id left join manufactures on products_list.manufacturers_id = manufactures.id left join out_list on out_list.id = out_product.out_id where manufactures.id = '$id' && datediff(NOW(),out_list.order_time) >= 0 && datediff(NOW(),out_list.order_time) <= ? group by out_product.product_id) t2
					on (t1.product_id = t2.product_id)
					right join
						(select products_list.id as product_id,products_list.name from out_product right join products_list on out_product.product_id = products_list.id right join manufactures on products_list.manufacturers_id = manufactures.id where manufactures.id = '$id' group by products_list.id) t3
					on (t3.product_id = t2.product_id)
					ORDER BY $order_by DESC
					limit ?
					;";
	$stmt = $ket_noi->prepare($qry_list);
	$stmt->bind_param("iii", $week, $month, $limit);
	$week = 7;
	$month = 30;
	$limit = 3;
	$stmt->execute();
	$result_stmt = $stmt->get_result();
	$data = $result_stmt->fetch_all(MYSQLI_ASSOC);

echo 	"<div id='manufactures_right_detail_panel'>";
echo 		"<div id='manufactures_info_detail_products_list'>";
echo 			"<div class='manufactures_info_detail_products_list_title'>
					<h1>Top 3 sản phẩm bán chạy của ".$result['name']."</h1>
				</div>";
echo 			"<div class='manufactures_info_detail_products_list_rows header_row'>
					<div class=\"align_center\">Tên sản phẩm</div>
					<div class=\"align_center\">Tổng số sản phẩm theo tuần</div>
					<div class=\"align_center\">Tổng số sản phẩm theo tháng</div>
				</div>";
				foreach ($data as $row) {
			
echo 				"<div class='manufactures_info_detail_products_list_rows'>
						<div class=\"align_left\">".$row['name']."</div>
						<div class=\"align_center\">".$row['number_week']."</div>
						<div class=\"align_center\">".$row['number_month']."</div>
					</div>";
				}
echo		"</div>";
	$order_by = "number_week DESC, number_month";
	$stmt_week = $ket_noi->prepare($qry_list);
	$stmt_week->bind_param("iii", $week, $month, $limit);
	$week = 7;
	$month = 30;
	$limit = 5;
	$stmt_week->execute();
	$result_week = $stmt_week->get_result();
	$data_week = $result_week->fetch_all(MYSQLI_ASSOC);
echo 		"<div class='div_graph'><canvas id=\"week_chart\" style=\"width:100%;max-width:600px\"></canvas></div>";
	$order_by = "number_month";
	$stmt_month = $ket_noi->prepare($qry_list);
	$stmt_month->bind_param("iii", $week, $month, $limit);
	$week = 7;
	$month = 30;
	$limit = 5;
	$stmt_month->execute();
	$result_month = $stmt_month->get_result();
	$data_month = $result_month->fetch_all(MYSQLI_ASSOC);
echo 		"<div class='div_graph'><canvas id=\"month_chart\" style=\"width:100%;max-width:600px\"></canvas></div>";
echo 	"</div>";
echo "</div>";
echo "<script type=\"text/javascript\" id='graph_data'>";
		$x_week_array = array();
		$y_week_array = array();
		foreach ($data_week as $row) {
			array_push($x_week_array,$row["name"]);
			array_push($y_week_array,$row["number_week"]);
		}
		$x_week_json = json_encode($x_week_array);
		$y_week_json = json_encode($y_week_array);
		echo "var x_values_week = ". $x_week_json . ";\n";
		echo "var y_values_week = ". $y_week_json . ";\n";

		$x_month_array = array();
		$y_month_array = array();
		foreach ($data_month as $row) {
			array_push($x_month_array,$row["name"]);
			array_push($y_month_array,$row["number_month"]);
		}
		$x_month_json = json_encode($x_month_array);
		$y_month_json = json_encode($y_month_array);
		echo "var x_values_month = ". $x_month_json . ";\n";
		echo "var y_values_month = ". $y_month_json . ";\n";
echo		"</script>";
mysqli_close($ket_noi);