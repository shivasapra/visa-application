<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visa extends Model
{
    protected $fillable = [
    	'travel_to','student_id','approved','rejected','re_applied','re_fund',

    ];

    public function student()
    {
    	return $this->belongsTo('App\studentProfile');
    }

}
