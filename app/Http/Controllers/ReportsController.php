<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentProfile;
use App\agentProfile;
use App\leads;
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

    public function applicationFee(){
        $students = studentProfile::all();
        $application_fee = 0;
        foreach ($students as $student) {
            $application_fee = $application_fee + $student->application_fee;
        }
        
        return view('reports.applicationFee')
                ->with('students',studentProfile::where('application_fee','!=',null)->get())
                ->with('application_fee',$application_fee);
    }

    public function tuitionFee(){
        $students = studentProfile::all();
        $tuition_fee = 0;
        foreach ($students as $student) {
            $tuition_fee = $tuition_fee + $student->tuition_fee;
        }
        return view('reports.tuitionFee')
                    ->with('students',studentProfile::where('tuition_fee','!=',null)->get())
                    ->with('tuition_fee',$tuition_fee);
    }

    public function agent(){
        return view('reports.agent')->with('agents',agentProfile::orderBy('created_at','desc')->get());
    }

    public function lead(Request $request){
        $array =[];
        foreach ($request->interested as $interested) {
            # code...
            $array = $request->interested;
        }
            $leads = leads::whereIn('interested',$array)->get();
            // dd($leads);

        return view('reports.lead')->with('leads',$leads);
    }
}
