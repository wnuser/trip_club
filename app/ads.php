<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    //
    protected $primaryKey   =   'id';
    protected $table        =   'ads';

    protected $guarded        =   ['id'];
}
