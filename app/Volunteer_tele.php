<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer_tele extends Model
{
    protected $fillable=['name','email','location','specialty','field','qualification','desiredtime'];
}
