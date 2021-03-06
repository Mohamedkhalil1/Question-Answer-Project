@extends('layouts.app')
@section('title' , 'Questions')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4> Questions</h4>
                        <div class="ml-auto">
                            <a href="{{route('question.create')}}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                   
                </div>
                <div class="card-body">
                    @include('layouts._message')
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong> {{str_plural('vote',$question->votes)}}
                                </div>
    
                                <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers_count }}</strong> {{str_plural('answer',$question->answers_count)}}
                                </div>
    
                                <div class="view">
                                    {{ $question->views .' '.str_plural('view',$question->views)}}
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                  
                                    <div class="ml-auto">
                                       @can('update',$question)
                                            <a href="{{route('question.edit',$question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan
                                        @can('delete',$question)
                                            <form class="form-delete" action="{{route('question.destroy',$question->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="reutrn confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                    
                                </div>
                                <p class="lead">
                                    Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-center">{{ $question->created_date }}</small>
                                </p>
                                {{ str_limit($question->body,255) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                  <div class="text-center">
                    {{$questions->links()}}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
