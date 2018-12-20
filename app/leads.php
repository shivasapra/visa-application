<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leads extends Model
{
    protected $fillable = ['agent_id','student_fname','email','student_lname','Mobile','address',
    						'postal_code','description','status' ];
}
