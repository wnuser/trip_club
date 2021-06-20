<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $primaryKey   =   'id';
    protected $table        =   'post';

    protected $guarded       =  ['id'];

    public function user() {
        return $this->hasOne('\App\User', 'id', 'user_id');
    }
    
    public function postLikes() {
        return $this->hasMany('\App\Models\Postlikes', 'post_id', 'id');
    }

    public function postComments() {
        return $this->hasMany('\App\Models\Postcomment', 'post_id', 'id');
    }
}
