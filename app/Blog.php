<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     protected $fillable=['name','email','post','postHead','url',];

     public function blogfile()
     {
     	return $this->hasMany('App\Blogfile');
     }
}
