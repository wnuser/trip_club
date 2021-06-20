<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postcomment extends Model
{
    //
    protected $primaryKey   =   'id';
    protected $table        =   'post_comment';

    protected $guarded       =  ['id'];

    public function user() {
        return $this->hasOne('\App\User', 'id', 'user_id');
    }
}
