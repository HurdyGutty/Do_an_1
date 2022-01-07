


<?php switch ($link) {
	case 'admin': ?>
	<div class="create">
		<form method="post" action="create/process_create_admin.php" class="admin_c">
			<div class="create_title">
				<h1>Thêm nhân viên</h1>
			</div>
			<div class="create_body">
				<label>Tên nhân viên:</label>
				<div>
					<input type="text" name="name">
					<div class="name_error">
					</div>
				</div>
				<label>Số điện thoại:</label>
				<div>
					<input type="text" name="phone">
					<div class="phone_error"></div>
				</div>
				<label>Địa chỉ:</label>
				<div>
					<input type="text" name="address">
					<div class="address_error">
					</div>
				</div>
				<label>Giới tính:</label>
				<div>
					<select name="gender">
						<option value="1" selected>Nam</option>
						<option value="0">Nữ</option>
					</select>
				</div>
				<label>Ngày sinh:</label>
				<div>
					<input type="date" name="birthday">
					<div class="birthday_error">
					</div> 
				</div>
				<label>Email:</label>
				<div>
					<input type="text" name="email">
					<div class="email_error">
					</div>
				</div>
				<label>Link ảnh:</label>
				<div>
					<input type="text" name="photo">
					<div class="photo_error">
					</div>
				</div>
				<label>Mật khẩu:</label>
				<div>
					<input type="text" name="password">
					<div class="email_error">
					</div>
				</div>
				<label>Vị trí:</label>
				<div>
					<select name="access">
						<option value="1">Quản lý</option>
						<option value="0" selected>Nhân viên</option>
					</select>
				</div>
			</div>
			<div class="create_button">
				<button type="submit">Thêm nhân viên</button>
			</div>
		</form>
	</div>
	<?php break;
	case 'manufacturers': ?>
	<div class="create">
		<form method="post" action="create/process_create_manufacturers.php" class="manu_c">
			<div class="create_title">
				<h1>Thêm nhà sản xuất</h1>
			</div>
			<div class="create_body">
				<label>Tên nhà sản xuất: </label>
				<div>
					<input type="text" name="name">
					<div class="name_error">
					</div>
				</div>
				<label>Số điện thoại: </label>
				<div>
					<input type="text" name="phone">
					<div class="phone_error"></div>
				</div>
				<label>Địa chỉ: </label>
				<div>
					<input type="text" name="address">
					<div class="address_error">
					</div>
				</div>
				<label>Mô tả: </label>
				<div>
					<textarea name="description" rows="4" cols="26"></textarea>
				</div>
				<label>Link ảnh: </label>
				<div>
					<input type="text" name="photo">
					<div class="photo_error">
					</div>
				</div>
			</div>
			<div class="create_button">
				<button type="submit">Thêm nhà sản xuất</button>
			</div>
		</form>
	</div>
	<?php break;
	case 'product': 
	$gender_sql = 'select * from products_gender';
	$gender = mysqli_query($ket_noi,$gender_sql);

	$category_sql = 'select * from products_category';
	$category = mysqli_query($ket_noi,$category_sql);

	$manufactures_sql = 'select * from manufactures';
	$manu = mysqli_query($ket_noi,$manufactures_sql);
	?>
	<div class="create">
		<form method="post" action="create/process_create_products.php" class="product_c">
			<div class="create_title">
				<h1>Thêm sản phẩm</h1>
			</div>
			<div class="create_body">
				<label>Tên sản phẩm: </label>
				<div>
					<input type="text" name="name">
					<div class="name_error">
					</div>
				</div>
				<label>Đối tượng: </label>
				<div>
					<select name="gender">
						<?php foreach ($gender as $gender_each) { ?>
							<option value="<?php echo $gender_each['id']; ?>"><?php echo $gender_each['gender'] ?></option>
						<?php }?> 
					</select> 
				</div>
				<label>Thể loại: </label>
				<div>
					<select name="category">
						<?php foreach ($category as $category_each) { ?>
							<option value="<?php echo $category_each['id']; ?>"><?php echo $category_each['category'] ?></option>
						<?php }?>
					</select> 
				</div>
				<label>Nhà sản xuất </label>
				<div>
					<select name="manufactures">
						<?php foreach ($manu as $manu_each) { ?>
							<option value="<?php echo $manu_each['id']; ?>"><?php echo $manu_each['name'] ?></option>
						<?php }?> 
					</select> 
				</div>
				<label>Giá: </label>
				<div>
					<input type="number" name="price">
					<div class="price_error"></div>
				</div>
				<label>Số lượng: </label>
				<div>
					<input type="number" name="quantity">
					<div class="quantity"></div>
				</div>
				<label>Link ảnh: </label>
				<div>
					<input type="text" name="photo">
					<div class="photo_error">
					</div>
				</div>
				<label>Mô tả: </label>
				<div>
					<textarea name="description" rows="4" cols="26"></textarea>
				</div>
			</div>
			<div class="create_button">
				<button type="submit">Thêm sản phẩm</button>
			</div>
		</form>
	</div>
	<?php break;
	default:
	header('location:logout.php');
	exit();
} ?>
