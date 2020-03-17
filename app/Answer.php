<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answer extends Model
{
    protected $fillable = [
        'title',
        'question_id'
    ];

    public function question() {
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }
}
