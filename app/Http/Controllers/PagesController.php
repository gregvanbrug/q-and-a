<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use App\Question;

class PagesController extends Controller
{
    public function __construct() {
        $this->data = (object)[];
    }

    public function index() {
        $data = $this->data;

        $questions = Question::all();
        $data->questions = $questions->sortByDesc('updated_at');

        $placeholders = ['Why did you go vegan?', 'What\'s your favorite thing to eat?', 'Is it expensive to eat a vegan diet?', 'Can you be an athlete on a vegan diet?'];
        $this->data->placeholder = Arr::random($placeholders);

        return view('home')->with('page', $data);
    }
}
