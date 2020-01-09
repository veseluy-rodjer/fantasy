{{-- <p> --}}
	{{-- <select id="select-language" name="language"> --}}
		{{-- @foreach (config('languages.languages') as $lang) --}}
			{{-- <option {{ \App::getLocale() == $lang ? 'selected' : null }}>{{ $lang }}</option> --}}
		{{-- @endforeach --}}
	{{-- </select> --}}
<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Dropdown button
    </a>
    <div class="dropdown-menu">
		<i class="dropdown-item" href="#">Link 1</i>
		<i class="dropdown-item" href="#">Link 2</i>
        <i class="dropdown-item" href="#">Link 3</i>
    </div>
</div>
{{-- </p> --}}
<a href="#"><span class="flag-icon flag-icon-en"></span></a>
<a href="#"><span class="flag-icon flag-icon-ru"></span></a>
<a href="#"><span class="flag-icon flag-icon-uk"></span></a>



<script>
// change language
{{-- let selectLanguage = document.querySelector('#select-language'); --}}
{{-- selectLanguage.onchange = function(e) { --}}
	{{-- let lang = this.value; --}}
	{{-- let route = "{{ route('setlocale') }}"; --}}
	{{-- document.location.href = route + '/' + lang + '/'; --}}
{{-- }  --}}
</script>
