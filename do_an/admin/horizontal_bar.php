<?php if ($_SESSION['accesss'] == 1) {
	include "super_admin.php";
};
?>
			
			<a href="admin_view.php?link=product<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'product') {echo 'class="active"';} ?>>
				<li>Sản phẩm</li>
			</a>
			<a href="admin_view.php?link=out<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'out') {echo 'class="active"';} ?>>
				<li>Đơn hàng</li>
			</a>