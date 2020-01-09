<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		<span class="flag-icon flag-icon-{{ \App::getLocale() }}"></span>
    </a>
    <div class="dropdown-menu">
		@foreach (config('languages.languages') as $lang)
			<a class="dropdown-item" href="#" onclick="selectLanguage(this); event.preventDefault()" data-lang="{{ $lang }}"><span class="flag-icon flag-icon-{{ $lang }}"></span></a>
		@endforeach
    </div>
</div>

<script>
// change language
function selectLanguage(e) {
	let lang = e.dataset.lang;
	let route = "{{ route('setlocale') }}";
	document.location.href = route + '/' + lang + '/';
}
</script>
