<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leads extends Model
{
    protected $fillable = ['agent_id','student_fname','email','student_lname','Mobile','address','postal_code','description','status','third_party','interested','not_interested_info','follow_up_info','state','district','city' ];


    public function agent()
	{
		return $this->belongsTo('App\agentProfile');	
	}
	public function student()
    {
    	return $this->belongsTo('App\studentProfile');
    }
    public function social()
    {
        return $this->belongsTo('App\social');
    }
}
