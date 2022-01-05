
				<div class="list_items super_order_list">
					<div class="align_center">Thông tin người đặt hàng</div>
					<div class="align_center">Thông tin người nhận hàng</div>
					<div class="align_center">Thời gian đặt hàng</div>
					<div class="align_center">Tình trạng đơn</div>
					<div class="align_center">Nhân viên duyệt</div>
					<div class="align_center">Thời gian duyệt</div>
				</div>
				<?php 
				foreach ($ket_qua as $each) {
					?>
					<div class="list_items super_order_list" onclick="viewpage(<?php echo $each['out_id'];?>)">
						<div class="align_left">
							<?php echo "Họ tên: ".$each['name'];?><br>
							<?php echo "Địa chỉ: ".$each['address'];?><br>
							<?php echo "Số điện thoại: ".$each['phone']; ?>
						</div>
						<div class="align_left">
							<?php echo "Họ tên: ".$each['receiver_name'];?><br>
							<?php echo "Địa chỉ: ".$each['receiver_address'];?><br>
							<?php echo "Số điện thoại: ".$each['receiver_phone']; ?>
						</div>
						<div class="align_center"><?php echo date('H:i:s d/m/Y',strtotime($each['order_time']));?></div>
						<div class="align_center"><?php echo $each['receipt_stat'];?></div>
						<div class="align_center"><?php echo $adm_name = $each['adm_name']??'x';?></div>
						<div class="align_center"><?php $work_time = $each['work_time']??'x';
									if($work_time!== 'x')
										{echo date('H:i:s d/m/Y',strtotime($work_time));}
										else{echo $work_time;} ?></div>
					</div>
				<?php 	};