window.onload = function() {

	let modalLoginQuery = $('#modal-login');
	let modalRegisterQuery = $('#modal-register');
	let modalVerifyQuery = $('#modal-verify');

	// popup modal login
	let currUrl = document.querySelector('body').dataset.currUrl;
	if (currUrl != '') {
		modalLoginQuery.modal('show');
	}

	// popup modal verify
	let unverifiedRedirect = document.querySelector('body').dataset.unverifiedRedirect;
	if (unverifiedRedirect != '') {
		modalVerifyQuery.modal('show');
	}

	// popup modal resent
	let resentRedirect = document.querySelector('body').dataset.resentRedirect;
	if (resentRedirect != '') {
		modalVerifyQuery.modal('show');
	}

	// send login form to server
	let loginForm = document.querySelector('#n-login-form');
	loginForm.onsubmit = async function(e) {
		e.preventDefault();
		let route = document.querySelector('body').dataset.routeLogin;
		let response = await fetch(route, {
		    headers: {
				'Accept': 'application/json',
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			method: 'POST',
			body: new FormData(loginForm)
		});
		let result = await response.json();
		let	elementErrors = document.querySelectorAll('.invalid-feedback');
		for (let elementError of elementErrors) {
			elementError.remove();
		}
		if (result.statusLogin === true) {
			if (currUrl != '') {
				return document.location.href = currUrl;
			};
			return document.location.href = result.prevHttp;
		}
		else if (null != result.errors) {
			let errors = result.errors;
			for (let [key, val] of Object.entries(errors)) {
				let elem = document.querySelector('#login-' + key);
				elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert"><strong>' + val + '</strong></span>');

			}
		}
	}

	// clean modal login with close it
	modalLoginQuery.on('hidden.bs.modal', function() {
		let	elementErrors = document.querySelectorAll('.invalid-feedback');
		for (let elementError of elementErrors) {
			elementError.remove();
		}
		let loginEmail = document.querySelector('#login-email')
		let loginPassword = document.querySelector('#login-password')
		let loginRemember = document.querySelector('#login-remember')
		loginEmail.value = '';
		loginPassword.value = '';
		loginRemember.checked = false;
	});

	// clean modal register with close it
	modalRegisterQuery.on('hidden.bs.modal', function() {
		let	elementErrors = document.querySelectorAll('.invalid-feedback');
		for (let elementError of elementErrors) {
			elementError.remove();
		}
		let registerName = document.querySelector('#register-name')
		let registerEmail = document.querySelector('#register-email')
		let registerPassword = document.querySelector('#register-password')
		let registerPasswordConfirm = document.querySelector('#register-password-confirm')
		registerName.value = '';
		registerEmail.value = '';
		registerPassword.value = '';
		registerPasswordConfirm.value = '';
	});

	// send register form to server
	let registerForm = document.querySelector('#n-register-form');
	registerForm.onsubmit = async function(e) {
		e.preventDefault();
		let route = document.querySelector('body').dataset.routeRegister;
		let response = await fetch(route, {
		    headers: {
				'Accept': 'application/json',
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			method: 'POST',
			body: new FormData(registerForm)
		});
		if (response.status == '403') {
			modalRegisterQuery.modal('hide');
			modalVerifyQuery.modal('show');
			return;
		}
		let result = await response.json();
		let elementErrors = document.querySelectorAll('.invalid-feedback');
		for (let elementError of elementErrors) {
			elementError.remove();
		}
		if (null != result.errors) {
			let errors = result.errors;
			for (let [key, val] of Object.entries(errors)) {
				let elem = document.querySelector('#register-' + key);
				elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert"><strong>' + val + '</strong></span>');

			}
		}
	}
}
