<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentProfile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'title', 'gender', 'first_language', 'DOB',
        'Mobile', 'address', 'postal_code', 'agent_id','lead_id','passport_no','passport_issue','social_id',
        'passport_expire','passport_country','tenth_percentage','twelveth_percentage','tenth_year','twelveth_year','tenth_board',
        'twelveth_board','twelveth_stream','test','test_date','test_remarks','test_score','third_party','tuition_fee','LOA','Loa_date','file_processing','file_processed','file_submission','submission_date','file_approved','approved_date','file_declined','declined_date','reapply','refund','refund_date','st_ins_1','st_ins_2','st_ins_3','nd_ins_1','nd_ins_2','nd_ins_3','rd_ins_1','rd_ins_2','rd_ins_3','listening','reading','writing','speaking','st_ins_date','nd_ins_date','rd_ins_date','application_fee','document_received','document_received_date','offer_letter','offer_letter_date','intake_session','submission_to_visa','submission_to_visa_date'
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
