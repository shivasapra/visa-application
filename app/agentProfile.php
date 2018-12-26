<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agentProfile extends Model
{
    protected $fillable = [
        'name', 'email', 'id_proof', 'license', 'photo','students', 'contracts',
		'revenue','commission','active_c','expired_c','about_to_expired_c','signed_c','added_c',
		'declined_c','interested','refused','proposal_sent','document_sent','agreement','certification','location','mobile','postal_code','address','id_no','license_no',
		'company','designation', 'state', 'district', 'website', 'college1', 'college2'
    ];

    public function student()
	{
		return $this->hasMany('App\studentProfile');	
	}
	public function leads()
	{
		return $this->hasMany('App\leads');	
	}
	public function contract()
	{
		return $this->hasMany('App\contracts');	
	}
}
