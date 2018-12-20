<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentProfile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'title', 'gender', 'first_language', 'DOB',
        'Mobile', 'address', 'postal_code', 'agent_id'
    ];
    public function agent()
    {
    	return $this->belongsTo('App\agentProfile');
    }

}
