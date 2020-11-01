<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class frontSlider extends Model
{
    //
    use SoftDeletes;
    protected $primaryKey   =  'id';
    protected $table        =  'front_slider';
}
