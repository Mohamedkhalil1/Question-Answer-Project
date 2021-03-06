<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{$answerCount . " " . str_plural('Answer',$answerCount)}}</h2>
                </div>
                <hr>
                @include('layouts._message')
                
                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="this answer is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">123</span>

                            <a title="this answer is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>

                            <a title="Mark this asnwer as best answer" class="{{$answer->status}} mt-2">
                                <i class="fas fa-check fa-2x"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!} 
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">
                                        @can('update',$answer)
                                             <a href="{{route('question.answer.edit',[$question->id,$answer->id])}}" class="btn btn-sm btn-outline-info">Edit</a>
                                         @endcan
                                         @can('delete',$answer)
                                             <form class="form-delete" action="{{route('question.answer.destroy',[$question->id,$answer->id])}}" method="POST">
                                                 @method('DELETE')
                                                 @csrf
                                                 <button type="submit" class="btn btn-outline-danger btn-sm" onclick="reutrn confirm('Are you sure?')">Delete</button>
                                             </form>
                                         @endif
                                     </div>
                                </div>

                                <div class="col-4">
                                </div>

                                <div class="col-4">
                                    <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                    <div class="media mt-2">
                                        <a href=" {{ $answer->user->url }} " class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="User Avatar">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url}}">
                                                {{ $answer->user->name }}
                                            </a>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>               
                @endforeach
            </div>
        </div>
    </div>
</div>