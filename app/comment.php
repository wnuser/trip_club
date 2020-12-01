<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected  $table        =   "comments";
    protected  $primaryKey   =    "id";

    protected  $fillable     =   ['blogId', 'name', 'email', 'comment'];

    public function blog() {
        return $this->hasOne(Blog::class, 'id', 'blogId');    
    }
}
