<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class identity extends Model
{
    protected $fillable = ['id_name','id_no','agent_id'];

    public function agent()
	{
		return $this->belongsTo('App\agentProfile');	
	}

    
}
