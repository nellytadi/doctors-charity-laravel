<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['name','organization','bio','email','projectHead','projectDesc','story','address','need','needDetail','status'];
     public function file()
     {
     	return $this->hasMany('App\File');
     }
}
