<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentProfile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'title', 'gender', 'first_language', 'DOB',
        'Mobile', 'address', 'postal_code', 'agent_id','lead_id','passport_no','passport_issue',
        'passport_expire','passport_country','tenth_percentage','twelveth_percentage','tenth_year','twelveth_year','tenth_board',
        'twelveth_board','twelveth_stream'
    ];
    public function agent()
    {
    	return $this->belongsTo('App\agentProfile');
    }
    public function lead()
    {
    	return $this->belongsTo('App\leads');
    }
    public function visa()
    {
        return $this->hasMany('App\visa');
    }
}
