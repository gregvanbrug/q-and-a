<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title'
    ];

    public function answers() {
        return $this->hasMany('App\Answer', 'question_id', 'id');
    }
}
