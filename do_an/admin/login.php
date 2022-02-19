<?php
	session_start();
	if(isset($_SESSION['id'])){
		header('location:admin_view.php');
		exit();
	}
	if(isset($_COOKIE['remember'])){
		$cookie_array = $_COOKIE['remember'];
		$cookie_value = unserialize($cookie_array);
		$encrypted_info = openssl_decrypt($cookie_value[1],"AES-128-ECB",$cookie_value[0]);
		$key_string = openssl_decrypt($cookie_value[0],"AES-128-ECB",$encrypted_info);
		$info_string = openssl_decrypt($encrypted_info,"AES-128-ECB",$key_string);
		$info_array = unserialize($info_string);
		session_start();
		$_SESSION['id'] = $info_array['id'];
		$_SESSION['name'] = $info_array['name'];
		$_SESSION['access'] = $info_array['access'];
		header('location:admin_view.php');
		exit();
	}
	if (isset($_SESSION['login_error'])) {
		echo "<script type='text/javascript'>alert('Đăng nhập không thành công');</script>";
		unset($_SESSION["login_error"]);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login admin</title>
	<style type="text/css">
		<?php require "../root/overlay_login.css" ?>
	</style>
</head>
<body>
	<div id="main_body">
		<div id="logo">
			<img src="//upload.wikimedia.org/wikipedia/vi/thumb/3/37/Bitis_logo.svg/501px-Bitis_logo.svg.png">
		</div>
		<form method="post" action="process_login.php" name="login">
			<div id="form_body">
				
				<h1>Đăng nhập</h1>
				<input type="email" class="form_margin input" name="email" placeholder="Email" onkeyup="check_mail()">
				<div id="email_error" class="form_margin error"></div>
				<input type="password" name="password" class="form_margin input" onkeyup="check_password()" placeholder="Mật khẩu">
				<div id="password_error" class="form_margin"></div>
				<div class="form_margin">
					<input type="checkbox" name="remember" class="form_margin error">
					Nhớ mật khẩu?
				</div>
				<button type="submit" class="form_margin input">Đăng nhập</button>
				
			</div>
		</form>
	</div>
	<script type="text/javascript">
		const key = document.querySelectorAll("input.input");
		function enter(event) {
			if (event.characterCode == 13){
				event.preventDefault();
			}
		}
		key[0].addEventListener('onkeydown',enter);
		key[1].addEventListener('onkeydown',enter);
		function check_mail(a) {
			let email = document.login.email.value;
			let regex_email = /^[\w\-\.]+@(?:[\w-]+\.)+[\w-]{2,4}$/;
			if (email.length === 0) {
				document.getElementById('email_error').textContent = 'Email không được để trống';
				a++;
			} else if(!regex_email.test(email)) {
				document.getElementById('email_error').textContent = 'Email không hợp lệ';
				a++
			} else if (regex_email.test(email)){
				a = 0;
				document.getElementById('email_error').innerHTML = '';
			}
			return a;
		}
		function check_password(b) {
			let password = document.login.password.value;
			let regex_password = /^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/;
			if (password.length === 0) {
				document.getElementById('password_error').textContent = 'Mật khẩu không được để trống';
				b++;
			} else if(!regex_password.test(password)) {
				document.getElementById('password_error').textContent = 'Mật khẩu cần ít nhất 8 chữ cái trong đó có 1 chữ cái in hoa, 1 chữ số';
				b++
			} else if (regex_password.test(password)){
				b = 0;
				document.getElementById('password_error').innerHTML = '';
			}
			return b;
		}
		const button = document.querySelector("button.input");
		function submit(event) {
			let a = 0;
			let b = 0;
			a = check_mail(a);
			b = check_password(b);
			if (a != 0 || b != 0){
				event.preventDefault();
			}
		}
		button.addEventListener('click',submit);
		


	</script>
</body>
</html>