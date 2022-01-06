


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
					<div>
					</div>
				</div>
				<label>Số điện thoại:</label>
				<div>
					<input type="text" name="phone">
				</div>
				<label>Địa chỉ:</label>
				<div>
					<input type="text" name="address">
				</div>
				<label>Giới tính:</label>
				<div>
					<select name="gender">
						<option value="1">Nam</option>
						<option value="0">Nữ</option>
					</select>
				</div>
				<label>Ngày sinh:</label>
				<div>
					<input type="date" name="birthday"> 
				</div>
				<label>Email:</label>
				<div>
					<input type="text" name="email">
				</div>
				<label>Link ảnh:</label>
				<div>
					<input type="text" name="photo">
				</div>
				<label>Mật khẩu:</label>
				<div>
					<input type="text" name="password">
				</div>
				<label>Vị trí:</label>
				<div>
					<select name="access">
						<option value="1">Quản lý</option>
						<option value="0">Nhân viên</option>
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
	<div class="create manu_c">
		<form method="post" action="create/process_create_manufacturers.php">
			<h1>Thêm nhà sản xuất</h1>
			<label>Tên nhà sản xuất: </label><br>
			<input type="text" name="name"><br>
			<label>Số điện thoại: </label><br>
			<input type="text" name="phone"><br>
			<label>Địa chỉ: </label><br>
			<input type="text" name="address"><br>
			<label>Mô tả: </label><br>
			<textarea name="description" rows="4" cols="50"></textarea><br>
			<label>Link ảnh: </label><br>
			<input type="text" name="photo"><br>
			<button type="submit">Thêm nhà sản xuất</button>
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
	<div class="create product_c">
		<form method="post" action="create/process_create_products.php">
			<h1>Thêm sản phẩm</h1>
			<label>Tên sản phẩm: </label><br>
			<input type="text" name="name"><br>
			<label>Đối tượng: </label><br>
			<select name="gender">
				<?php foreach ($gender as $gender_each) { ?>
					<option value="<?php echo $gender_each['id']; ?>"><?php echo $gender_each['gender'] ?></option>
				<?php }?> 
			</select> <br>
			<label>Thể loại: </label><br>
			<select name="category">
				<?php foreach ($category as $category_each) { ?>
					<option value="<?php echo $category_each['id']; ?>"><?php echo $category_each['category'] ?></option>
				<?php }?>
			</select> <br>
			<label>Nhà sản xuất </label><br>
			<select name="manufactures">
				<?php foreach ($manu as $manu_each) { ?>
					<option value="<?php echo $manu_each['id']; ?>"><?php echo $manu_each['name'] ?></option>
				<?php }?> 
			</select> <br>
			<label>Giá: </label><br>
			<input type="number" name="price"> <br>
			<label>Số lượng: </label><br>
			<input type="number" name="quantity"><br>
			<label>Link ảnh: </label><br>
			<input type="text" name="photo"><br>
			<label>Mô tả: </label><br>
			<textarea name="description" rows="4" cols="30"></textarea><br>
			<button type="submit">Thêm sản phẩm</button>
		</form>
	</div>
	<?php break;
	default:
	header('location:logout.php');
	exit();
} ?>
