<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PagesController extends Controller
{
    public function index() {

        $data = (object)[];
        $data->title = 'Ask a vegan';

        $placeholders = ['When did you go vegan?', 'What\'s your favorite thing to eat?', 'Is it expensive to eat a vegan diet?', 'Can you be an athlete on a vegan diet?'];
        $data->placeholder = Arr::random($placeholders);

        return view('home')->with('page', $data);
    }
}
