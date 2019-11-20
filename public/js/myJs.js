window.onload = function() {

	// send login form to server
	let loginForm = document.querySelector('#n-login-form');
	loginForm.onsubmit = async function(e) {
		e.preventDefault();
		let route = '{{ route("login") }}';
		let response = await fetch('login', {
		    headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			method: 'POST',
			body: new FormData(loginForm)
		});
		let result = await response.json();
		if (result.statusLogin === true) {
			document.location.href = result.prevHttp;
		}
	}

	// popup modal login
	let statusLogin = document.querySelector('#status-login');
	if (statusLogin.textContent == true) {
		let modalLogin = document.querySelector('#n-modal-login');
		modalLogin.click();
		console.log(modalLogin);
	};

}
