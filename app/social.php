<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
	protected $fillable=['social'];

    public function student()
	{
		return $this->hasMany('App\studentProfile');	
	}
	public function leads()
	{
		return $this->hasMany('App\leads');	
	}
}
