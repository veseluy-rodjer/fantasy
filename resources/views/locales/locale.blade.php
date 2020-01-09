<p>
	<select id="select-language" name="language">
		@foreach (config('languages.languages') as $lang)
			<option {{ \App::getLocale() == $lang ? 'selected' : null }}>{{ $lang }}</option>
		@endforeach
	</select>
</p>
<span class="flag-icon flag-icon-en"></span>
<span class="flag-icon flag-icon-ru"></span>
<span class="flag-icon flag-icon-uk"></span>
<script>
// change language
let selectLanguage = document.querySelector('#select-language');
selectLanguage.onchange = function(e) {
	let lang = this.value;
	let route = "{{ route('setlocale') }}";
	document.location.href = route + '/' + lang + '/';
} 
</script>
