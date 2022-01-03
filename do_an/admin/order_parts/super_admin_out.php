
				<div class="list_items">
					<div>Thông tin người đặt hàng</div>
					<div>Thông tin người nhận hàng</div>
					<div>Thời gian đặt hàng</div>
					<div>Tình trạng đơn</div>
					<div>Nhân viên duyệt</div>
					<div>Thời gian duyệt</div>
				</div>
				<?php 
				foreach ($ket_qua as $each) {
					?>
					<div class="list_items" onclick="viewpage(<?php echo $each['out_id'];?>)">
						<div>
							<?php echo "Tên: ".$each['name'];?><br>
							<?php echo "Địa chỉ: ".$each['address'];?><br>
							<?php echo "Số điện thoại: ".$each['phone']; ?>
						</div>
						<div>
							<?php echo "Tên người nhận: ".$each['receiver_name'];?><br>
							<?php echo "Địa chỉ người nhận: ".$each['receiver_address'];?><br>
							<?php echo "Số điện thoại người đặt: ".$each['receiver_phone']; ?>
						</div>
						<div><?php echo $each['order_time'];?></div>
						<div><?php echo $each['receipt_stat'];?></div>
						<div><?php echo $adm_name = $each['adm_name']??'x';?></div>
						<div><?php $work_time = $each['work_time']??'x';
									if($work_time!== 'x')
										{echo date('H:i:s d/m/Y',strtotime($work_time));}
										else{echo $work_time;} ?></div>
					</div>
				<?php 	};