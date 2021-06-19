<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postlikes extends Model
{
    //
    protected $primaryKey   =  'id';
    protected $table        =  'post_likes';
    protected $guarded      =  ['id'];

    public function user() {
        return $this->hasOne('\App\User', 'id', 'user_id');
    }

    public function posts() {
        return $this->hasOne('\App\Models\post', 'id', 'post_id');
    }
}
