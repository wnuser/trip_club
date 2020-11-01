<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class blogCategory extends Model
{
    //

    use SoftDeletes;
    protected $primaryKey   =   'id';
    protected $table        =   'blog_categories';
}
