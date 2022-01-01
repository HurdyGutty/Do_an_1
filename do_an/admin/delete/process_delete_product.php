<?php 
	$id = $_POST['id'];

	require_once '../../root/connect.php';

	$delete_sql = "delete from products_list where id = '$id'";
	mysqli_query($ket_noi,$delete_sql);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=product');