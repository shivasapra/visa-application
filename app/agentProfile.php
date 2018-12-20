<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agentProfile extends Model
{
    protected $fillable = [
        'name', 'email', 'id_proof', 'license', 'photo','students', 'contracts',
		'revenue','commission','active_c','expired_c','about_to_expired_c','added_c',
		'declined_c'
    ];

    public function student()
	{
		return $this->hasMany('App\studentProfile');	
	}
}
