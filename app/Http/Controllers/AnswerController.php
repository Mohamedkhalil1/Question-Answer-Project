<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\AnswerRequest;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question,AnswerRequest $request)
    {
        $question->answer()->create([
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('question.show',$question->slug)->with('success','answer has been added');
    }


    public function edit(Question $question , Answer $answer){
        $this->authorize('update',$answer);
        return view('answers.edit',compact('question','answer'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerRequest $request, Question $question ,Answer $answer)
    {
       $this->authorize('update',$answer);
       $answer->update([
           'body'=>$request->body
           ]);
        return redirect()->route('question.show',[$question->slug])->with('success','your answer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,Answer $answer)
    {
        $this->authorize('delete',$answer);
        $answer->delete();
        return redirect()->route('question.show',$question->slug)->with('success','your answer has been deleted');
    }
}
