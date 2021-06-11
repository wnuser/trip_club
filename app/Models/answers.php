<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    //
    protected $primaryKey   =   'id';
    protected $table        =   'answers';

    protected $guarded       =  ['id'];

    public function answerMentor() {
        return $this->hasOne('\App\user', 'id', 'mentor_id');
    }

    public function answerLikes() {
        return $this->hasMany('\App\Models\likes', 'answer_id', 'id');
    }
}
