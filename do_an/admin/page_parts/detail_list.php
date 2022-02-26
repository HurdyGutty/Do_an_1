
		<div id="main_list">
			<?php 
			switch ($link) {
				case 'product':
				?>
				<div class="list_items products_view">
					<div class="align_center">Tên sản phẩm</div>
					<div class="align_center">Giá sản phẩm</div>
					<div class="align_center">Nhà sản xuất</div>
					<div class="align_center">Mô tả</div>
				</div>
				<?php
				foreach ($ket_qua as $each) {
					?>
					<div class="list_items products_view" onclick="viewpage(<?php echo $each['id'];?>)">
						<div class="align_left"><?php echo $each['name']; ?></div>
						<div class="align_center"><?php echo $each['price']; ?></div>
						<div class="align_center"><?php echo $each['manufactures_name'];?></div>
						<div class="align_center"><?php echo $each['description'];?></div>
					</div>
				<?php 	};	
				break;
				case 'out':
				if ($_SESSION['access'] == 1) {
					include 'order_parts/super_admin_out.php';
				} else {
					?>
					<div class="list_items order_list">
						<div class="align_center">Thông tin người đặt hàng</div>
						<div class="align_center">Thông tin người nhận hàng</div>
						<div class="align_center">Thời gian đặt hàng</div>
						<div class="align_center">Tình trạng</div>
					</div>
					<?php 
					foreach ($ket_qua as $each) {
						?>
						<div class="list_items order_list">
							<div class="align_left tooltip buyer">
								<div class="one_liner"><?php echo "Tên: ".$each['name'];?></div>
								<div class="one_liner"><?php echo "Địa chỉ: ".$each['address'];?></div>
								<div class="one_liner"><?php echo "Số điện thoại: ".$each['phone']; ?></div>
								<div class="tooltiptext"><?php echo "Địa chỉ: ".$each['address'];?>
									<div class="left-point"></div>
								</div>
							</div>
							<div class="align_left tooltip receiver">
								<div class="one_liner"><?php echo "Tên người nhận: ".$each['receiver_name'];?></div>
								<div class="one_liner"><?php echo "Địa chỉ người nhận: ".$each['receiver_address'];?></div>
								<div class="one_liner"><?php echo "Số điện thoại người đặt: ".$each['receiver_phone']; ?></div>
								<div class="tooltiptext"><?php echo "Địa chỉ: ".$each['receiver_address'];?>
									<div class="left-point"></div>
								</div>
							</div>
							<div class="align_center"><?php echo date('H:i:s d/m/Y',strtotime($each['order_time']));?></div>
							<?php 
								$receipt_stat = $each['receipt_stat'];
								$admin_id = $each['adm_id'];
								switch ($receipt_stat) {
									case 'Mới':
									if ($admin_id == $_SESSION['id'] || is_null($admin_id)){									
							?>			
										<form action="order_parts/order_stat_change.php" method="POST">
											<input type="text" name="order" hidden value="<?php echo $each['out_id']; ?>">
											<select name="receipt_stat">
												<option <?php echo ($each['receipt_stat'] === 'Mới')? 'selected' :"" ?>>
													Mới
												</option>
												<option <?php echo ($each['receipt_stat'] === 'Đã hủy')? 'selected' :"" ?>>
													Đã hủy
												</option>
												<option <?php echo ($each['receipt_stat'] === 'Đã duyệt')? 'selected' :"" ?>>
													Đã duyệt
												</option>
											</select>
											<button class="check_order">Duyệt đơn</button>
										</form>
							<?php 	} else {
							?>
										<div class="align_center">
											<?php echo $each['receipt_stat']; ?>
										</div>
							<?php	}
									break;
									case 'Đã duyệt':
									if ($admin_id == $_SESSION['id']){
							?>
										<form action="order_parts/order_stat_change.php" method="POST">
											<input type="text" name="order" hidden value="<?php echo $each['out_id']; ?>">
											<select name="receipt_stat">
												<option <?php echo ($each['receipt_stat'] === 'Mới')? 'selected' :"" ?>>
													Mới
												</option>
												<option <?php echo ($each['receipt_stat'] === 'Đã hủy')? 'selected' :"" ?>>
													Đã hủy
												</option>
												<option <?php echo ($each['receipt_stat'] === 'Đã duyệt')? 'selected' :"" ?>>
													Đã duyệt
												</option>
											</select>
											<button class="check_order">Duyệt đơn</button>
										</form>
							<?php 	} else {
							?>
										<div class="align_center">
											<?php echo $each['receipt_stat']; ?>
										</div>
							<?php	}
									break;
									case 'Đã hủy':
									if ($admin_id == $_SESSION['id']){
							?>
										<form action="order_parts/order_stat_change.php" method="POST">
											<input type="text" name="order" hidden value="<?php echo $each['out_id']; ?>">
											<select name="receipt_stat">
												<option <?php echo ($each['receipt_stat'] === 'Mới')? 'selected' :"" ?>>
													Mới
												</option>
												<option <?php echo ($each['receipt_stat'] === 'Đã hủy')? 'selected' :"" ?>>
													Đã hủy
												</option>
												<option <?php echo ($each['receipt_stat'] === 'Đã duyệt')? 'selected' :"" ?>>
													Đã duyệt
												</option>
											</select>
											<button class="check_order">Duyệt đơn</button>
										</form>
							<?php 	} else {
							?>
										<div class="align_center">
											<?php echo $each['receipt_stat']; ?>
										</div>
							<?php	}
									break;
									default:
							?>
										<div class="align_center">
											<?php echo $each['receipt_stat']; ?>
										</div>
							<?php			
										break;
								}
							?>
						</div>
					<?php 	};
				};	
				break;
				case 'manufacturers':
				if($_SESSION['access'] == 1) {
					?>
					<div class="list_items manufacturers_list">
						<div class="align_center">Tên nhà sản xuất</div>
						<div class="align_center">Mô tả về nhà sản xuất</div>
						<div class="align_center">Số điện thoại</div>
						<div class="align_center">Địa chỉ</div>
					</div>
					<?php 
					foreach ($ket_qua as $each) {
						?>
						<div class="list_items manufacturers_list" onclick="viewpage(<?php echo $each['id'];?>)">
							<div class="align_center"><?php echo $each['name']; ?></div>
							<div class="align_left"><?php echo $each['description']; ?></div>
							<div class="align_center"><?php echo $each['phone'];?></div>
							<div class="align_center"><?php echo $each['address'];?></div>
						</div>
					<?php };
				} else{header('location:logout.php');};
				break;
				default:
				header('location:logout.php');
				exit();
			}
			?>
			<div id="page_list">
				<?php for ($i=1 ; $i <= $max_page ; $i++) 
				{ ?>
					<a href="?link=<?php echo $link?><?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>&page=<?php echo $i?>&tool=<?php echo $tool;?>"><?php echo $i ?></a>	
				<?php }; ?>
			</div>
		</div>