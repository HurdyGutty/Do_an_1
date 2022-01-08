	function check_name(a) {
			let name = document.getElementsByName("email")[0].value;
			let regex_name = /^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,8}$/;
			if (name.length === 0) {
				document.getElementsByClassName('name_error')[0].textContent = 'Họ tên không được để trống';
				a++;
			} else if(!regex_email.test(email)) {
				document.getElementsByClassName('name_error')[0].textContent = 'Họ tên không hợp lệ';
				a++
			} else if (regex_email.test(email)){
				document.getElementsByClassName('name_error')[0].innerHTML = '';
			}
			return a;
		}
	function check_phone(a) {
			let phone = document.getElementsByName("phone")[0].value;
			let regex_phone = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
			if (phone.length === 0) {
				document.getElementsByClassName('phone_error')[0].textContent = 'Số điện thoại không được để trống';
				a++;
			} else if(!regex_email.test(email)) {
				document.getElementsByClassName('phone_error')[0].textContent = 'Số điện thoại không hợp lệ';
				a++
			} else if (regex_email.test(email)){
				document.getElementsByClassName('phone_error')[0].innerHTML = '';
			}
			return a;
		}

	function check_address(a) {
			let address = document.getElementsByName("address")[0].value;
			let regex_address = /^(?:Tỉnh|Thành phố) [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zyàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,3}$/;
			if (address.length === 0) {
				document.getElementsByClassName('address_error')[0].textContent = 'Tỉnh thành không được để trống';
				a++;
			} else if(!regex_email.test(email)) {
				document.getElementsByClassName('address_error')[0].textContent = 'Tỉnh thành không hợp lệ';
				a++
			} else if (regex_email.test(email)){
				document.getElementsByClassName('address_error')[0].innerHTML = '';
			}
			return a;
		}



	function check_mail(a) {
			let email = document.getElementsByName("email")[0].value;
			let regex_email = /^[\w\-\.]+@(?:[\w-]+\.)+[\w-]{2,4}$/;
			if (email.length === 0) {
				document.getElementsByClassName('email_error')[0].textContent = 'Email không được để trống';
				a++;
			} else if(!regex_email.test(email)) {
				document.getElementsByClassName('email_error')[0].textContent = 'Email không hợp lệ';
				a++
			} else if (regex_email.test(email)){
				document.getElementsByClassName('email_error')[0].innerHTML = '';
			}
			return a;
		}

	function check_password(b) {
			let password = document.getElementsByName("password")[0].value;
			let regex_password = /^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/;
			if (password.length === 0) {
				document.getElementsByClassName('password_error')[0].textContent = 'Mật khẩu không được để trống';
				a++;
			} else if(!regex_password.test(password)) {
				document.getElementsByClassName('password_error')[0].textContent = 'Mật khẩu cần ít nhất 8 chữ cái trong đó có 1 chữ cái in hoa, 1 chữ số';
				a++
			} else if (regex_password.test(password)){
				document.getElementsByClassName('password_error')[0].innerHTML = '';
			}
			return a;
		}
		const button = document.querySelector("button.submit_form");
		function submit(event) {
			let a = 0;
			a = check_name(a) + check_phone(a) + check_address(a) + check_mail(a) + check_password(a)
			if (a != 0){
				event.preventDefault();
			}
		}
		button.addEventListener('click',submit);