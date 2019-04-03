<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
    	'imagen',
    	'titulo',
    	'background',
    	'link1',
    	'link2',
    ];
}
