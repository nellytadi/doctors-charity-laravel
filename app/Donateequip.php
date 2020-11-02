<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donateequip extends Model
{
    protected $fillable= ['name','email','project','equipmentname','state','location','ownership','message','expecteduse'];
    
}
