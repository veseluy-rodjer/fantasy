window.onload = function() {
	n_login.submit = async function(e) {
		e.preventDefault();
		let route = '{{ route("login") }}';
		let response = await fetch(login, {
			method: 'POST',
			body: new FormData(n_login)
		});
		let result = await response.json();
		console.log(result);
	}

}
