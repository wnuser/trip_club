<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Scopes\UserBlogScope;


class Blog extends Model
{
    //
    protected $primaryKey   =   'id';
    protected $table        =   'blogs';

    protected $guarded       =  ['id'];

    
    public function comment() {
        return $this->hasMany(comment::class, 'blogId', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserBlogScope);
    }

   
}
