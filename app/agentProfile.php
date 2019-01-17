<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agentProfile extends Model
{
    protected $fillable = [
        'name', 'email', 'id_proof', 'license', 'photo','students', 'contracts',
		'revenue','commission','active_c','expired_c','signed_c',
		'declined_c','interested','proposal_sent','agreement_signed_agent','agreement_sent',
		'agreement_signed_college','location','mobile','postal_code','address',
		'company','designation', 'state', 'district', 'website','document_received','certificate_issued','certificate_issued_date',
			'agreement_sent_date','agreement_signed_agent_date',
			'agreement_signed_college_date','reference1_name','reference1_phone',
			'reference1_email','reference1_contact','reference1_website',
			'reference2_name','reference2_phone','reference2_email',
			'reference2_contact','reference2_website','photos_received','percentage','proposal_sent_date','document_received_date'
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
	public function identity()
	{
		return $this->hasMany('App\identity');	
	}
}
