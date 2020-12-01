<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adsHistory extends Model
{
    //
    //
    protected $primaryKey   =   'id';
    protected $table        =   'ads_history';
    protected $guarded        =   ['id'];
}
