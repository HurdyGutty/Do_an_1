
<?php
	$stat = $_POST['receipt_stat'];
	$order_id = $_POST['order'];
	require_once '../../root/connect.php';
	session_start();
	$admin_id = $_SESSION['id'];
	date_default_timezone_set('asia/ho_chi_minh');
	$work_time = date('Y-m-d H:i:s',time());
	$update_sql = "update receipt_history set receipt_stat = '$stat', adm_id = '$admin_id', work_time = '$work_time' where out_id = $order_id";
	$update_query = mysqli_query($ket_noi,$update_sql);

	header("location:javascript://history.go(-1)");