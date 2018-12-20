<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agentProfile extends Model
{
    protected $fillable = [
        'name', 'email', 'id_proof', 'license', 'photo','students', 'contracts',
		'revenue','commission','active_c','expired_c','about_to_expired_c','added_c',
		'declined_c','interested','refused','proposal_sent','document_sent','agreement','certification'
    ];

    public function student()
	{
		return $this->hasMany('App\studentProfile');	
	}
	public function leads()
	{
		return $this->hasMany('App\leads');	
	}
}
