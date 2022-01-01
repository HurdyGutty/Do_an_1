<?php if($_SESSION['access'] != 1){
	header('location:logout.php');
}
switch($link) {
	case 'admin':
	$admin_sql = "select * from adm_list where access = 0";
	$admin_tabl = mysqli_query($ket_noi,$admin_sql);
	?>
	<div class="delete admin_d" id="main_body">
		<?php 
		foreach ($ket_qua as $each) {
			if ($each['access'] == 0) {
				?>
				<form method="post" action="delete/process_delete_admin.php" class="items">
					<img src="<?php echo $each['photo'];?>">
					<input type="hidden" name="id" value="<?php echo $each['id'];?>">
					<div><?php echo $each['name']; ?></div>
					<div><?php echo $each['phone'];?></div>
					<div><?php echo date_format(new DateTime($each['birthday']),"d/m/Y");?></div>
					<button type="submit">Xóa nhân viên</button>
				</form>
			<?php } else { ?>
				<div class="items">
					<img src="<?php echo $each['photo']?>">
					<div><?php echo $each['name']; ?></div>
					<div><?php echo $each['phone'];?></div>
					<div><?php echo date_format(new DateTime($each['birthday']),"d/m/Y");?></div>
				</div>
			<?php } 
		}; ?>
		<div id="page">
			<?php for ($i=1 ; $i <= $max_page ; $i++) 
			{ ?>
				<a href="?link=<?php echo $link?><?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>&page=<?php echo $i?>&tool=<?php echo $tool;?>"><?php echo $i ?></a>	
			<?php }; ?>
		</div>
	</div>
	<?php break;
	case 'product':
	?>
	<div class="delete prod_d" id="main_list">
		<div class="list_items">
			<div>Tên sản phẩm</div>
			<div>Giá sản phẩm</div>
			<div>Nhà sản xuất</div>
			<div>Mô tả</div>
		</div>
		<?php
		foreach ($ket_qua as $each) {
			?>
			<form method="post" action="delete/process_delete_product.php" class="list_items">
				<input type="hidden" name="id" value="<?php echo $each['id'];?>">
				<div><?php echo $each['name']; ?></div>
				<div><?php echo $each['price']; ?></div>
				<div><?php echo $each['manufactures_name'];?></div>
				<div><?php echo $each['description'];?></div>
				<button type="submit">Xóa</button>
			</form>
		<?php 	}; ?>
		<div id="page_list">
			<?php for ($i=1 ; $i <= $max_page ; $i++) 
			{ ?>
				<a href="?link=<?php echo $link?><?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>&page=<?php echo $i?>&tool=<?php echo $tool;?>"><?php echo $i ?></a>	
			<?php }; ?>
		</div>
	</div>
	<?php	break;
	default:
	header('location:logout.php');
	exit();
}
?>
