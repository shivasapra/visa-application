<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contracts extends Model
{
    protected $fillable = ['agent_id','subject','contract_value','description',
    					'start_date','end_date','signed','signed_fname','signed_lname',
    					'signed_email'];

    public function agent()
	{
		return $this->belongsTo('App\agentProfile');	
	}
}
