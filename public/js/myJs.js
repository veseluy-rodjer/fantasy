window.onload = function() {

	let modalLoginQuery = $('#modal-login');
	let modalRegisterQuery = $('#modal-register');
	let modalVerifyQuery = $('#modal-verify');

	// send login form to server
	let loginForm = document.querySelector('#n-login-form');
	loginForm.onsubmit = async function(e) {
		e.preventDefault();
		let route = '{{ route("login") }}';
		let response = await fetch('login', {
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
			if (currUrl.textContent != '') {
				return document.location.href = currUrl.textContent;
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

	// popup modal login
	let currUrl = document.querySelector('#curr-url');
	if (currUrl.textContent != '') {
		modalLoginQuery.modal('show');
	}

	// clean modal login with close it
	modalLoginQuery.on('hidden.bs.modal', function() {
		let	elementErrors = document.querySelectorAll('.invalid-feedback');
		for (let elementError of elementErrors) {
			elementError.remove();
		}
	});

	// clean modal register with close it
	modalRegisterQuery.on('hidden.bs.modal', function() {
		let	elementErrors = document.querySelectorAll('.invalid-feedback');
		for (let elementError of elementErrors) {
			elementError.remove();
		}
	});

	// send register form to server
	let registerForm = document.querySelector('#n-register-form');
	registerForm.onsubmit = async function(e) {
		e.preventDefault();
		let route = '{{ route("register") }}';
		let response = await fetch('register', {
		    headers: {
				'Accept': 'application/json',
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			method: 'POST',
			body: new FormData(registerForm)
		});
		let result = await response.json();
		let elementErrors = document.querySelectorAll('.invalid-feedback');
		for (let elementError of elementErrors) {
			elementError.remove();
		}
		if (result.statusregister === true) {
			if (currUrl.textContent != '') {
				return document.location.href = currUrl.textContent;
			};
			return document.location.href = result.prevHttp;
		}
		else if (null != result.errors) {
			let errors = result.errors;
			for (let [key, val] of Object.entries(errors)) {
				let elem = document.querySelector('#register-' + key);
				elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert"><strong>' + val + '</strong></span>');

			}
		}
	}
}
