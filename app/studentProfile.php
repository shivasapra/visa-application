<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentProfile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'title', 'gender', 'first_language', 'DOB',
        'Mobile', 'address', 'postal_code', 'agent_id','lead_id','passport_no','passport_issue','social_id',
        'passport_expire','passport_country','tenth_percentage','twelveth_percentage','tenth_year','twelveth_year','tenth_board',
        'twelveth_board','twelveth_stream','test','test_date','test_remarks','test_score','third_party','tuition_fee','LOA','Loa_date','file_processing','file_processed','file_submission','submission_date','file_approved','approved_date','file_declined','declined_date','reapply','refund','refund_date','1st_ins_1','1st_ins_2','1st_ins_3','2nd_ins_1','2nd_ins_2','2nd_ins_3','3rd_ins_1','3rd_ins_2','3rd_ins_3'
    ];
    public function agent()
    {
    	return $this->belongsTo('App\agentProfile');
    }
    public function social()
    {
        return $this->belongsTo('App\social');
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
