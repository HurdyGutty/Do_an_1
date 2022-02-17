<?php 
require_once '../../root/connect.php';

$id = mysqli_real_escape_string($ket_noi,$_POST['id']);
$password_old = mysqli_real_escape_string($ket_noi,$_POST['password_old']);
$password_new = mysqli_real_escape_string($ket_noi,$_POST['password_new']);

$regex_password = "/^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/";

if (preg_match($regex_password,$password_old) == 1 && preg_match($regex_password,$password_new) == 1){
$sql = "select password from adm_list where id = ?";

$stmt = $ket_noi->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result_stmt = $stmt->get_result();
$data = $result_stmt->fetch_all(MYSQLI_ASSOC);

	if($data[0]['password'] == $password_old){
		$update_sql = "update adm_list set password = ? where id = ?";
		$stmt_update = $ket_noi->prepare($update_sql);
		$stmt_update->bind_param("ss", $password_new, $id);
		$stmt_update->execute();
	}

}
mysqli_close($ket_noi);
header("location:javascript://history.go(-1)");
