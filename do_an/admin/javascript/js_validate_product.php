		function check_name(a) {
			let name = document.getElementsByName("email")[0].value;
			let regex_name = /^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,9}(?: [a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,9}){0,8}$/;
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
	const button = document.querySelector("button.submit_form");
		function submit(event) {
			let a = 0;
			a = check_name(a);
			if (a != 0){
				event.preventDefault();
			}
		}
	button.addEventListener('click',submit);