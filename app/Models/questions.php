<?php

namespace App\Models;
use user;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    //

    protected $primaryKey   =   'id';
    protected $table        =   'questions';

    protected $guarded       =  ['id'];

    public function seekers() {
        return $this->hasOne('\App\User', 'id', 'seeker_id');
    }

    public function mentor() {
        return $this->hasOne('\App\User', 'id', 'mentor_id');
    }

    public function answers() {
        return $this->hasMany(answers::class, 'question_id', 'id');
    }

    
}
