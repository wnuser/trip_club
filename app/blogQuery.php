<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogQuery extends Model
{
    //
    protected $table = "blog_queries";
    protected $primaryKey = "id";

    protected $fillable = ['name', 'email', 'mobile', 'blog_info'];
}
