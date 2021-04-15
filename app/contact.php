<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
    protected $primaryKey   =   'id';
    protected $table        =   'contact';

    protected $guarded       =  ['id'];
}
