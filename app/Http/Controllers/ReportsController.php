<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentProfile;
class ReportsController extends Controller
{
    public function offer_letter(){
    	return view('reports.offer_letter')->with('students',studentProfile::where('offer_letter','yes')->get());
    }

    public function LOA(){
    	return view('reports.LOA')->with('students',studentProfile::where('LOA','yes')->get());
    }

    public function visa(){
    	return view('reports.visa')->with('students',studentProfile::where('submission_to_visa','yes')->get());
    }

    public function refund(){
    	return view('reports.refund')->with('students',studentProfile::where('refund','yes')->get());
    }
}
