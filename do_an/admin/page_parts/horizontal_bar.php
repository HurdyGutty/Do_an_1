
<?php if (!empty($_SESSION['access'])) {
	include "page_parts/super_admin.php";
};
?>
			
			<a href="?link=product<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'product') {echo 'class="active"';} ?>>
				<li>Sản phẩm</li>
			</a>
			<a href="?link=out<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'out') {echo 'class="active"';} ?>>
				<li>Đơn hàng</li>
			</a>