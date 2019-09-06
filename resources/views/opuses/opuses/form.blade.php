<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title">{{ 'Title' }}</label>
    @if ('text' === 'file' && !empty($opus->title))
    <img src="{{ config('paths.' . str_plural('opus')) . $opus->id . '/' . $opus->title }}">
@endif
@if (!empty(old("title")))
<input class="form-control" name="title" type="text" id="title" value="{{ old("title") }}">
@else
<input class="form-control" name="title" type="text" id="title" value="{{ $opus->title ?? ''}}">
@endif

    @foreach ($errors->get('title') as $message)
        {!! '<p class="help-block">' . $message . '</p>' !!}
    @endforeach
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    <label for="text">{{ 'Text' }}</label>
    @if (!empty(old("text")))
    <textarea class="form-control summernote" rows="5" name="text" type="textareaOnly" id="text">{!! old("text") !!}</textarea>
@else
    <textarea class="form-control summernote" rows="5" name="text" type="textareaOnly" id="text">{!! $opus->text ?? '' !!}</textarea>
@endif



    @foreach ($errors->get('text') as $message)
        {!! '<p class="help-block">' . $message . '</p>' !!}
    @endforeach
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
