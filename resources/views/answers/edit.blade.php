@extends('layouts.app')
@section('title','Answer|Update')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Editing the answer for question : <a href="{{route('question.show',$question->slug)}}">{{ $question->title }}</a></h3>
                        <hr>
                        <form action="{{route('question.answer.update',[$question->id,$answer->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <textarea name = "body" id="question-body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}">{{ $answer->body }}</textarea>
                                @if($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('body')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg" >Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection