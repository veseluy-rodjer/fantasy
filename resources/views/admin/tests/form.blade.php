<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title">{{ 'Title' }}</label>
    @if ('text' === 'file' && !empty($test->title))
    <img src="{{ config('paths.' . str_plural('test')) . $test->id . '/' . $test->title }}">
@endif
@if (!empty(old("title")))
<input class="form-control" name="title" type="text" id="title" value="{{ old("title") }}">
@else
<input class="form-control" name="title" type="text" id="title" value="{{ $test->title ?? ''}}">
@endif

    @foreach ($errors->get('title') as $message)
        {!! '<p class="help-block">' . $message . '</p>' !!}
    @endforeach
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content">{{ 'Content' }}</label>
    @if (!empty(old("content")))
    <textarea class="form-control summernote" rows="5" name="content" type="textareaOnly" id="content">{!! old("content") !!}</textarea>
@else
    <textarea class="form-control summernote" rows="5" name="content" type="textareaOnly" id="content">{!! $test->content ?? '' !!}</textarea>
@endif



    @foreach ($errors->get('content') as $message)
        {!! '<p class="help-block">' . $message . '</p>' !!}
    @endforeach
</div>
<label>{{ 'Photo' }}</label>
<div id="div-photo" class="image-preview form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" id="label-photo" class="control-label">Загрузить</label>
    @if ('file' === 'file' && !empty($test->photo))
    <img src="{{ config('paths.' . str_plural('test')) . $test->id . '/' . $test->photo }}">
@endif
@if (!empty(old("photo")))
<input class="form-control" name="photo" type="file" id="photo" value="{{ old("photo") }}">
@else
<input class="form-control" name="photo" type="file" id="photo" value="{{ $test->photo ?? ''}}">
@endif

</div>
@foreach ($errors->get('photo') as $message)
<div class="has-error">
    {!! '<p class="help-block">' . $message . '</p>' !!}
</div>
@endforeach


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
