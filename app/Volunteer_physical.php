<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer_physical extends Model
{
    protected $fillable=['name','email','location','specialty','field','qualification'];
}
