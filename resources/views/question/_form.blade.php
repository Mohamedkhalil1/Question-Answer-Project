@csrf
<div class="form-group">
    <label for="question-title">Question Title</label>
    <input type="text" value="{{ isset($question->title) ? $question->title : old('title')}}" name = "title" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" >
    @if($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('title')}}</strong>
        </div>
    @endif
</div>

<div class="form-group">
    <label for="question-body">Explian your question</label>
    <textarea name = "body" id="question-body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}">{{ isset($question->body) ? $question->body : old('body')}}</textarea>
    @if($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('body')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <button class="btn btn-outline-primary">{{$buttonTxt}}</button>
</div>