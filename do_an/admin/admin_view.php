
<?php require '../root/check_login_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin page</title>
	<style type="text/css">
	<?php require "../root/overlay.css" ?>
	</style>
</head>
<body>
	<?php 
	require_once '../root/connect.php';
	if(isset($_GET['link'])){
	$link = $_GET['link'];
	} else {
		$link = 'out';
	}
	if(isset($_GET['tim_kiem'])){
		$tim_kiem = $_GET['tim_kiem'];
	} else {
		$tim_kiem = "";
	} 
	$attachment = '';
	$target = '*';
	$surfix = '';
	switch ($link) {
		case 'admin':
			$table = 'adm_list';
			$list = 'ava_list';
			break;
		case 'manufacturers':
			$table = 'manufactures';
			$list = 'detail_list';
			break;
		case 'product':
			$table = 'products_list';
			$list = 'detail_list';
			$target = 'products_list.*,manufactures.name as manufactures_name';
			$attachment = "join manufactures on $table.manufacturers_id = manufactures.id";
			$surfix = 'products_list.';
			break;
		case 'out':
			$table = 'out_list';
			$list = 'detail_list';
			$attachment = "join cli_list on $table.client_id = cli_list.id join receipt_history on $table.id = receipt_history.out_id left join adm_list on receipt_history.adm_id = adm_list.id";
			$surfix = 'cli_list.';
			$target = 'out_list.*,cli_list.*,receipt_history.*,adm_list.name as adm_name';
			break;
		default:
			header('location:logout.php');
			exit();
	}
	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}else {
			$page = 1;
		};
	$sql_dem = "select count(*) from $table $attachment where ".$surfix."name like '%$tim_kiem%'";
	$ket_qua_dem = mysqli_fetch_array(mysqli_query($ket_noi,$sql_dem));
	$so_ket_qua = $ket_qua_dem['count(*)'];
	$so_ket_qua_1_trang = 7;
	$max_page = ceil($so_ket_qua / $so_ket_qua_1_trang);
	$offset = $so_ket_qua_1_trang*($page-1);

	$sql = "select $target from $table $attachment 
			where ".$surfix."name like '%$tim_kiem%'
			limit $so_ket_qua_1_trang offset $offset";
	$ket_qua = mysqli_query($ket_noi,$sql);
	?>
	<div id="main_div">
		<div id="nav_ver">
			<img src="//upload.wikimedia.org/wikipedia/vi/thumb/3/37/Bitis_logo.svg/501px-Bitis_logo.svg.png">
		<ul>
			<?php include "nav_ver.php"; ?>			
		</ul>
		</div>
		
		<div id="compartment">
			<form action="add_search.php">
				<input type="text" name="tim_kiem" value="<?php echo $tim_kiem ?>">
				<input type="text" name="link" value="<?php echo $link ?>" hidden >
				<button type="submit">Tìm kiếm tên</button>
			</form>
		</div>
		
		<div id="nav_hor">
		<ul>
			<?php require "horizontal_bar.php"; ?>
		</ul>
		</div>
		<?php include "$list.php"; ?>
		<div id="footer">
			
		</div>
	</div>
	<?php mysqli_close($ket_noi); ?>
	<script type="text/javascript">
		function viewpage(num){
			const xhttp = new XMLHttpRequest();
			xhttp.onload = function() {
				<?php if($link == "admin"){
				echo "document.getElementById(\"main_body\").innerHTML = this.responseText;";
			} else {
				echo "document.getElementById(\"main_list\").innerHTML = this.responseText;";
			}?>
			};
			<?php
			switch($link){
				case 'product':
				echo "xhttp.open(\"GET\",\"detail_view/product_detail.php?d=\"+num);";
				break;
				case 'out':
				echo "xhttp.open(\"GET\",\"detail_view/order_detail.php?d=\"+num);";
				break;
				case 'manufacturers':
				echo "xhttp.open(\"GET\",\"detail_view/manufacturers_detail.php?d=\"+num);";
				break;
				case 'admin':
				echo "xhttp.open(\"GET\",\"detail_view/admin_detail.php?d=\"+num);";
				break; 
			}
			?>
			xhttp.send();
			
		}
		const reload_page = function(){
			window.location.reload();
		}
		const fix_page = function(num){
			const xhttp = new XMLHttpRequest();
			xhttp.onload = function() {
				<?php if($link == "admin"){
				echo "document.getElementById(\"main_body\").innerHTML = this.responseText;";
			} else {
				echo "document.getElementById(\"main_list\").innerHTML = this.responseText;";
			}?>
			}
			<?php 
			switch ($link) {
				case 'product':
				echo "xhttp.open(\"GET\",\"fixing/product_fix.php?d=\"+num);";
				break;
				case 'out':
				echo "xhttp.open(\"GET\",\"fixing/order_fix.php?d=\"+num);";
				break;
				case 'manufacturers':
				echo "xhttp.open(\"GET\",\"fixing/manufacturers_fix.php?d=\"+num);";
				break;
				case 'admin':
				echo "xhttp.open(\"GET\",\"fixing/admin_fix.php?d=\"+num);";
				break; 
						}?>
			xhttp.send();
		}
	</script>
</body>
</html>