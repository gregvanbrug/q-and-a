<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Question;
use App\Answer;

class QuestionsController extends PagesController
{
    public function index() {
    }

    public function store(Request $request) {
        $data = $this->data;

        $rules = [
            'question' => 'required|min:5|ends_with:?|unique:App\Question,title'
        ];

        $errorMessages = [
            'question.required'  => 'A question is required.',
            'question.min'       => 'Your question should be a minimum of 5 characters long.',
            'question.ends_with' => 'Your question must end with a question mark.',
            'question.unique'    => 'This question has already been asked. Did you have another?'
        ];

        $this->validate($request, $rules, $errorMessages);

        $question = new Question([
            'title' => $request->get('question')
        ]);
        $question->save();

        return redirect()->back()->with('success', 'Question Posted!');
    }

    public function show($id) {
        $data = Question::find($id);
        $data->answers = $data->answers->sortByDesc('updated_at');
        return view('question.show')->with('page', $data);
    }
}
