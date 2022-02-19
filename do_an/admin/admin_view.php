
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

	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
	</script>

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
	if (isset($_GET['tool'])) {
		$tool = $_GET['tool'];	
	} else {
		$tool = 'view';
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
	if ($tool === "del" && empty($_SESSION['access'])) {
		header('location:logout.php');
	}
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

	$user_name = $_SESSION['name'];
	$user_id = $_SESSION['id'];

	$sql_ava = "select photo from adm_list where id = ?";
	$stmt_ava = $ket_noi->prepare($sql_ava);
	$stmt_ava->bind_param("s", $user_id);
	$stmt_ava->execute();
	$result_ava = $stmt_ava->get_result();
	$data_ava = $result_ava->fetch_all(MYSQLI_ASSOC);
	$ava_link = $data_ava[0]['photo'];

	$match_username = array();
	$regex_username = "/\s?[\wÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{1,10}$/";
	preg_match($regex_username,$user_name,$match_username);
	?>
	<div id="main_div">
		<div id="nav_panel">
			<img src="hn-initial-logo-ampersand-monogram-600w-336042029.webp">
		<ul>
			<div id="nav_ver">
			<?php include "page_parts/nav_ver.php"; ?>	
			</div>		
		</ul>
		</div>
		
		<div id="compartment">
			<form action="page_parts/add_search.php">
				<input type="text" name="tim_kiem" value="<?php echo $tim_kiem ?>">
				<input type="text" name="link" value="<?php echo $link ?>" hidden >
				<button type="submit">Tìm kiếm tên</button>
			</form>
			<div id="user_control" class="dropbtn" onclick="menu_drop()">
				<img src="<?php echo $ava_link ?>">
				<span><?php echo $match_username[0] ?></span>
				<div id="myDropdown" class="dropdown-content">
					<a href="#" id="popup_password" onclick="password_change_menu()">Đổi mật khẩu</a>
    				<a href="logout.php">Đăng xuất</a>
 				</div>
			</div>
			<div id="password_change_popup" class="match_class">
				<img src="https://www.freeiconspng.com/uploads/close-icon-29.png" class="close_btn" onclick = "close_menu()">
    			<form action="password/password_update.php" method="POST" id="change_pass">
					<input type="hidden" name="id" value = "<?php echo $user_id; ?>" style="display: none;">
					<label>Mật khẩu cũ: </label>
					<div>
						<input type="password" name="password_old" id = "old_p">
						<div class="password_menu_error"></div>
					</div>
					<label>Mật khẩu mới: </label>
					<div>
						<input type="password" name="password_new" id="new_p">
						<div class="password_menu_error"></div>
					</div>
					<label>Nhập lại mật khẩu mới: </label>
					<div>
						<input type="password" name="confirm_password_new" id="new_confirm">
						<div class="password_menu_error"></div>
					</div>
					<button type="submit" id="pass_change_btn" onclick="update_password(event)">Đổi mật khẩu</button>
    			</form>
    		</div>
		</div>
		
		<div id="nav_hor">
		<ul>
			<?php require "page_parts/horizontal_bar.php"; ?>
		</ul>
		</div>

		<?php 
		switch ($tool) {
			case 'view':
				include "page_parts/$list.php";
				break;
			case 'create':
				include "create/create.php";
				break;
			case 'del':
				include "delete/delete.php";
				break;
			default:
				header('location:logout.php');
				break;
		}
		 
		?>
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
			}
				switch ($link){
					case 'product':
						echo "var script = document.createElement(\"script\");
    							script.type = \"text/javascript\";
    							script.src = \"javascript/graph_product.js.\"; 
    							document.getElementsByTagName(\"body\")[0].appendChild(script);
    							return false;";
						break;
					case 'manufacturers':
						echo "var script = document.createElement(\"script\");
    							script.type = \"text/javascript\";
    							script.src = \"javascript/graph_manu.js.\"; 
    							document.getElementsByTagName(\"body\")[0].appendChild(script);
    							return false;";
						break;
					default:
						echo "";
					}
					?>
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
		<?php if ($tool === 'create' || $tool === 'view'){
			switch ($link) {
				case 'admin':
					include 'javascript/js_validate_admin.php';
					break;
				case 'manufacturers':
					include 'javascript/js_validate_manufacturers.php';
					break;
				case 'product':
					include 'javascript/js_validate_product.php';
					break;
		}}?>

	function menu_drop() {
 		 document.getElementById("myDropdown").classList.toggle("show");
		}

	window.onclick = (event) => {
 		if (!event.target.matches('.dropbtn')) {
    		var dropdowns = document.getElementsByClassName("dropdown-content");
   			var i;
    		for (i = 0; i < dropdowns.length; i++) {
      			var openDropdown = dropdowns[i];
      			if (openDropdown.classList.contains('show')) {
        			openDropdown.classList.remove('show');
      			}
    		}
  		}
  		}	
	function password_change_menu(){
		document.getElementById("password_change_popup").style.display = "block";
	}
	function close_menu(){
		document.getElementById("password_change_popup").style.display = "none";
	}
	function update_password(event){
		event.preventDefault();
		let password_old = document.getElementsByName("password_old")[0].value;
		let password_new = document.getElementsByName("password_new")[0].value;
		let confirm_password_new = document.getElementsByName("confirm_password_new")[0].value;
		let regex_password = /^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/;
		let a = 0
			if (password_old.length === 0 || password_new.length === 0 || confirm_password_new.length === 0) {
				document.getElementsByClassName('password_menu_error')[0].textContent = 'Mật khẩu không được để trống';
				document.getElementsByClassName('password_menu_error')[1].textContent = 'Mật khẩu không được để trống';
				document.getElementsByClassName('password_menu_error')[2].textContent = 'Mật khẩu không được để trống';
				a++;
			} else if(!regex_password.test(password_old)) {
				document.getElementsByClassName('password_menu_error')[0].textContent = 'Mật khẩu cần ít nhất 8 chữ cái trong đó có 1 chữ cái in hoa, 1 chữ số';
				a++;
			} else if (!regex_password.test(password_new)){
				document.getElementsByClassName('password_menu_error')[1].textContent = 'Mật khẩu cần ít nhất 8 chữ cái trong đó có 1 chữ cái in hoa, 1 chữ số';
				a++;
			} else if (!regex_password.test(confirm_password_new)){
				document.getElementsByClassName('password_menu_error')[2].textContent = 'Mật khẩu cần ít nhất 8 chữ cái trong đó có 1 chữ cái in hoa, 1 chữ số';
				a++;
			} else if (password_new !== confirm_password_new){
				document.getElementsByClassName('password_menu_error')[2].textContent = 'Ô này không trùng với mật khẩu mới'
				a++;
			} else if (password_old === password_new){
				document.getElementsByClassName('password_menu_error')[1].textContent = 'Mật khẩu mới bị trùng với mật khẩu cũ'
				a++;
			} else{
				document.getElementsByClassName('password_menu_error')[0].innerHTML = '';
				document.getElementsByClassName('password_menu_error')[1].innerHTML = '';
				document.getElementsByClassName('password_menu_error')[2].innerHTML = '';
				a = -1;
			}
		if (a == -1) document.getElementById("change_pass").submit();
	}
	</script>
</body>
</html>