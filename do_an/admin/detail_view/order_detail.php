
<?php 
require_once '../../root/connect.php';
$id = mysqli_real_escape_string($ket_noi,$_GET['d']);

$qry = "select out_list.*,cli_list.*,receipt_history.*,adm_list.name as adm_name from out_list join cli_list on out_list.client_id = cli_list.id join receipt_history on out_list.id = receipt_history.out_id left join adm_list on receipt_history.adm_id = adm_list.id where out_list.id = $id";
$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));


$sql_order = "select out_list.*,out_product.*,products_list.name as product_name from out_list join out_product on out_list.id = out_product.out_id join products_list on out_product.product_id = products_list.id where out_list.id = $id";
$full_order = mysqli_query($ket_noi,$sql_order);

echo "<div id= 'order_detail'>";
echo	"<div class='client_info'>
			<h1> Thông tin người đặt </h1>";
echo 		"<span>Tên người đặt: </span><span>".$result['name']. "</span>";
echo		"<span>Số điện thoại: </span><span>".$result['phone']. "</span>";
echo 		"<span>Địa chỉ: </span><span>".$result['address']. "</span>";
echo	"</div>
		<div class='client_info'>
			<h1>Thông tin người nhận </h1>";
echo		"<span>Tên người nhận: </span><span>".$result['receiver_name']. "</span>";
echo		"<span>Số điện thoại: </span><span>".$result['receiver_phone']. "</span>";
echo		"<span>Địa chỉ: </span><span>".$result['receiver_address']. "</span>";
echo	"</div>
		<div id = 'order_info'> 
			<h1>Thông tin đơn: </h1>
			<div id = 'order_detail_info'>";
echo			"<span>Thời gian đặt: </span><span>".date('H:i:s d/m/Y',strtotime($result['order_time'])). "</span>";
session_start();
if($_SESSION['access'] == 1){
	echo		"<span>Người duyệt đơn: </span><span>". $adm_name = $result['adm_name']??'x'. "</span>";
	echo		"<span>Thời gian duyệt: </span><span>";
	$work_time = $result['work_time']??'x';
	if($work_time!== 'x')
		{echo date('H:i:s d/m/Y',strtotime($work_time))."</span>";}
	else{echo $work_time."</span>";} 
};
echo		"</div>";
echo		"<table>
				<tr>
					<th>Sản phẩm</th>
					<th>Số lượng</th>
				</tr>";
foreach($full_order as $order_item) {
	echo		"<tr>
					<td>".$order_item['product_name']."</td>";
	echo			"<td class = 'text_center'>".$order_item['quantity']."</td>
				</tr>";
}
echo		"</table>
		</div>
	 </div>";
mysqli_close($ket_noi);