<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Answer;

class AnswersController extends PagesController
{
    public function store(Request $request) {
        $id = $request->get('id');

        $data = $this->data;

        $rules = [
            'answer' => 'required|min:5'
        ];

        $errorMessages = [
            'answer.required' => 'An answer is required.',
            'answer.min'      => 'Your answer should be a minimum of 5 characters long.'
        ];

        $this->validate($request, $rules, $errorMessages);

        $answer = new Answer([
            'title'       => $request->get('answer'),
            'question_id' => $id
        ]);
        $answer->save();

        return redirect()->back()->with('success', 'Answer Posted!');
    }
}
