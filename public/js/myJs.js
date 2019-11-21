window.onload = function() {

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
		if (result.statusLogin === true) {
			if (currUrl.textContent != '') {
				return document.location.href = currUrl.textContent;
			};
			return document.location.href = result.prevHttp;
		}
		else if (null != result.errors) {
			let errors = result.errors;
			console.log(errors);
			for (let[key, val] of errors) {
				let elem = document.querySelector('#login-' + key);
				elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert"><strong>' + val + '</strong></span>');

			}
		}
	}

	// popup modal login
	let currUrl = document.querySelector('#curr-url');
	if (currUrl.textContent != '') {
		let modalLogin = document.querySelector('#n-modal-login');
		modalLogin.click();
	};
}
