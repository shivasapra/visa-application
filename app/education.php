<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    protected $fillable = ['education','percentage','passing_year','student_id'];

    public function student()
    {
        return $this->belongsTo('App\studentProfile');
    }
}
