<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    //
    protected $primaryKey   =   'id';
    protected $table        =   'post';

    protected $guarded       =  ['id'];

    public function user() {
        return $this->hasOne('\App\User', 'id', 'user_id');
    }
}
