@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4> {{$question->title}} </h4>
                        <div class="ml-auto">
                            <a href="{{route('question.index')}}" class="btn btn-outline-secondary">Back to all Questions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('question.store')}}" method="post">
                        {!! $question->body_html !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
