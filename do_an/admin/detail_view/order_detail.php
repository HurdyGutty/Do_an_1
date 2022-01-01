
<?php 
$id = $_GET['d'];
require_once '../../root/connect.php';
$qry = "select out_list.*,cli_list.*,receipt_history.*,adm_list.name as adm_name from out_list join cli_list on out_list.client_id = cli_list.id join receipt_history on out_list.id = receipt_history.out_id left join adm_list on receipt_history.adm_id = adm_list.id where out_list.id = $id";
$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));


$sql_order = "select out_list.*,out_product.*,products_list.name as product_name from out_list join out_product on out_list.id = out_product.out_id join products_list on out_product.product_id = products_list.id where out_list.id = $id";
$full_order = mysqli_query($ket_noi,$sql_order);

echo	"<div>Thông tin người đặt <br>";
echo 	"Tên người đặt: ".$result['name']. "<br>";
echo	"Số điện thoại: ".$result['phone']. "<br>";
echo 	"Địa chỉ: ".$result['address']. "<br>";
echo	"</div>
<div>Thông tin người nhận: <br>";
echo	"Tên người nhận: ".$result['receiver_name']. "<br>";
echo	"Số điện thoại: ".$result['receiver_phone']. "<br>";
echo	"Địa chỉ: ".$result['receiver_address']. "<br>";
echo	"</div>
<div> Thông tin đơn: <br>";
echo	"Thời gian đặt: ".date('H:i:s d/m/Y',strtotime($result['order_time'])). "<br>";
session_start();
if($_SESSION['access'] == 1){
	echo		"Người duyệt đơn: ". $adm_name = $result['adm_name']??'x'. "<br>";
	echo		"Thời gian duyệt: ";
	$work_time = $result['work_time']??'x';
	if($work_time!== 'x')
		{echo date('H:i:s d/m/Y',strtotime($work_time));}
	else{echo $work_time;} 
};
echo	"<table>
<tr>
<th>Sản phẩm</th>
<th>Số lượng</th>
</tr>";
foreach($full_order as $order_item) {
	echo	"<tr>
	<td>".$order_item['product_name']."</td>";
	echo	"<td>".$order_item['quantity']."</td>
	</tr>";
}
echo	"</table>
</div>";
mysqli_close($ket_noi);