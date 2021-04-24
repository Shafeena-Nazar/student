<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
    	'student',
    	'markMaths',
    	'markHistory',
    	'markScience',
    	'markTotal',
    	'term'
    ];
}
