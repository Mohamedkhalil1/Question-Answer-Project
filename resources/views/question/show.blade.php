@extends('layouts.app')
@section('title','Question')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h4> {{$question->title}} </h4>
                            <div class="ml-auto">
                                <a href="{{route('question.index')}}" class="btn btn-outline-secondary">Back to all Questions</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="this question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">123</span>

                            <a title="this question is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>

                            <a title="click to mark as favorite question (click here to undo)" class="favorite mt-2 favorited">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorite-count">123</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Asked {{ $question->created_date }}</span>
                                <div class="media mt-2">
                                    <a href=" {{ $question->user->url }} " class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="User Avatar">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url}}">
                                            {{ $question->user->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('answers._index' , [
        'answers' => $question->answer,
        'answerCount' => $question->answers_count
    ]);
    @include('answers._create',['question_id' => $question->id]);
</div>
@endsection
