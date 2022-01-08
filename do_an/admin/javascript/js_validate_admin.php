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
				a = 0;
			}
			return a;
		}
	function check_phone(b) {
			let phone = document.getElementsByName("phone")[0].value;
			let regex_phone = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
			if (phone.length === 0) {
				document.getElementsByClassName('phone_error')[0].textContent = 'Số điện thoại không được để trống';
				b++;
			} else if(!regex_email.test(email)) {
				document.getElementsByClassName('phone_error')[0].textContent = 'Số điện thoại không hợp lệ';
				b++
			} else if (regex_email.test(email)){
				document.getElementsByClassName('phone_error')[0].innerHTML = '';
				b = 0;
			}
			return b;
		}

	function check_address(c) {
			let address = document.getElementsByName("address")[0].value;
			let regex_address = /^(?:Tỉnh|Thành phố) [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zyàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,3}$/;
			if (address.length === 0) {
				document.getElementsByClassName('address_error')[0].textContent = 'Tỉnh thành không được để trống';
				c++;
			} else if(!regex_email.test(email)) {
				document.getElementsByClassName('address_error')[0].textContent = 'Tỉnh thành không hợp lệ';
				c++
			} else if (regex_email.test(email)){
				document.getElementsByClassName('address_error')[0].innerHTML = '';
				c = 0;
			}
			return c;
		}



	function check_mail(d) {
			let email = document.getElementsByName("email")[0].value;
			let regex_email = /^[\w\-\.]+@(?:[\w-]+\.)+[\w-]{2,4}$/;
			if (email.length === 0) {
				document.getElementsByClassName('email_error')[0].textContent = 'Email không được để trống';
				d++;
			} else if(!regex_email.test(email)) {
				document.getElementsByClassName('email_error')[0].textContent = 'Email không hợp lệ';
				d++
			} else if (regex_email.test(email)){
				document.getElementsByClassName('email_error')[0].innerHTML = '';
				d = 0;
			}
			return d;
		}

	function check_password(e) {
			let password = document.getElementsByName("password")[0].value;
			let regex_password = /^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/;
			if (password.length === 0) {
				document.getElementsByClassName('password_error')[0].textContent = 'Mật khẩu không được để trống';
				e++;
			} else if(!regex_password.test(password)) {
				document.getElementsByClassName('password_error')[0].textContent = 'Mật khẩu cần ít nhất 8 chữ cái trong đó có 1 chữ cái in hoa, 1 chữ số';
				e++
			} else if (regex_password.test(password)){
				document.getElementsByClassName('password_error')[0].innerHTML = '';
				e = 0;
			}
			return e;
		}
		const button = document.querySelector("button.submit_form");
		function submit(event) {
			let a = 0;
			let b = 0;
			let c = 0;
			let d = 0;
			let e = 0;
			a = check_name(a);
			b = check_phone(b);
			c = check_address(c);
			d = check_mail(d);
			e = check_password(e);
			if (a != 0 || b != 0 || c != 0 || d != 0 || e != 0){
				event.preventDefault();
			}

		}
		button.addEventListener('click',submit);