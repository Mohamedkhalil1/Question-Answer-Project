<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Your Answer</h3>
                    <hr>
                    <form action="{{route('question.answer.store',$question->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name = "body" id="question-body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}"></textarea>
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