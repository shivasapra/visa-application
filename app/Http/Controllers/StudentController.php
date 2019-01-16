<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentProfile;
use App\agentProfile;
use Session;
use App\social;
use Carbon\Carbon;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index')->with('students',studentProfile::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
           $dt = Carbon::now();
           $dt->timezone('Asia/Kolkata');
           $date_today = $dt->toDateString();
           // dd($date_today);
        return view('student.create')->with('agents',agentProfile::all())
                                    ->with('socials',social::all())
                                    ->with('date_today',$date_today);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'first_language' => 'required',
            'DOB' => 'required',
            'Mobile' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'passport_no' => 'required',
            'passport_issue' => 'required',
            'passport_expire' => 'required',
            'passport_country' => 'required',
            'tenth_percentage' => 'required|integer',
            'twelveth_percentage' => 'required|integer',
            'tenth_year' => 'required|integer',
            'twelveth_year' => 'required|integer',
            'tenth_board' => 'required',
            'twelveth_board' => 'required',
            'twelveth_stream' => 'required',
            'test' =>'required',
            'test_date' =>'required',
        ]);

        $student = new studentProfile;
        if ($request->source == 'agent') {
            $student->agent_id = $request->idd;
            $agent = agentProfile::find($request->idd);
            $agent->students = $agent->students + 1;
            $agent->save();
        }
        if ($request->source == 'social') {
            $student->social_id = $request->idd;
        }
        if ($request->source == 'third_party') {
            $student->third_party = $request->third_party;
        }
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->gender = $request->gender;
            $student->title = $request->title;
            $student->first_language = $request->first_language;
            $student->DOB = $request->DOB;
            $student->Mobile = $request->Mobile;
            $student->address = $request->address;
            $student->postal_code = $request->postal_code;
            $student->passport_no = $request->passport_no;
            $student->passport_issue = $request->passport_issue;
            $student->passport_expire = $request->passport_expire;
            $student->passport_country = $request->passport_country;
            $student->tenth_percentage = $request->tenth_percentage;
            $student->twelveth_percentage = $request->twelveth_percentage;
            $student->tenth_year = $request->tenth_year;
            $student->twelveth_year = $request->twelveth_year;
            $student->tenth_board = $request->tenth_board;
            $student->twelveth_board = $request->twelveth_board;
            $student->twelveth_stream = $request->twelveth_stream;
            $student->test_date = $request->test_date;
            if($request->test == 'ILETS'){
                $student->test = $request->test;
                $student->listening = $request->listening;
                $student->reading = $request->reading;
                $student->writing = $request->writing;
                $student->speaking = $request->speaking;
            }
            if($request->test == 'others'){
                $student->test = $request->othervalue;
            }
            if($request->has('test_remarks')){
                $student->test_remarks = $request->test_remarks;
            }
            if($request->has('test_score')){
                $student->test_score = $request->test_score;
            }
        $student->save();

        
        Session::flash('success','student created successfully');
        return redirect()->route("students");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // $agents = agentProfile::all();
        $student = studentProfile::find($id);
        $dt = Carbon::now();
        $dt->timezone('Asia/Kolkata');
        $date_today = $dt->toDateString();
        return view('student.edit')->with('student',$student)
                                    ->with('date_today',$date_today);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'first_language' => 'required',
            'DOB' => 'required',
            'Mobile' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'passport_no' => 'required',
            'passport_issue' => 'required',
            'passport_expire' => 'required',
            'passport_country' => 'required',
            'tenth_percentage' => 'required|integer',
            'twelveth_percentage' => 'required|integer',
            'tenth_year' => 'required|integer',
            'twelveth_year' => 'required|integer',
            'tenth_board' => 'required',
            'twelveth_board' => 'required',
            'twelveth_stream' => 'required',
            'test' =>'required',
            'test_date' =>'required',
        ]);

        
        $student = studentProfile::find($id);
        if ($student->agent_id) {
            $student->agent_id = $request->idd;
        }
        if ($request->social_id) {
            $student->social_id = $request->idd;
        }
        if ($request->source == 'third_party') {
            $student->third_party = $request->third_party;
        }
            $student->agent_id = $request->agent_id;
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->gender = $request->gender;
            $student->title = $request->title;
            $student->first_language = $request->first_language;
            $student->DOB = $request->DOB;
            $student->Mobile = $request->Mobile;
            $student->address = $request->address;
            $student->postal_code = $request->postal_code;
            $student->passport_no = $request->passport_no;
            $student->passport_issue = $request->passport_issue;
            $student->passport_expire = $request->passport_expire;
            $student->passport_country = $request->passport_country;
            $student->tenth_percentage = $request->tenth_percentage;
            $student->twelveth_percentage = $request->twelveth_percentage;
            $student->tenth_year = $request->tenth_year;
            $student->twelveth_year = $request->twelveth_year;
            $student->tenth_board = $request->tenth_board;
            $student->twelveth_board = $request->twelveth_board;
            $student->twelveth_stream = $request->twelveth_stream;
            
            $student->test_date = $request->test_date;
            if($request->test == 'ILETS'){
                $student->test = $request->test;
                $student->listening = $request->listening;
                $student->reading = $request->reading;
                $student->writing = $request->writing;
                $student->speaking = $request->speaking;
            }
            if($request->test == 'others'){
                $student->test = $request->othervalue;
            }
            if($request->has('test_remarks')){
                $student->test_remarks = $request->test_remarks;
            }
            if($request->has('test_score')){
                $student->test_score = $request->test_score;
            }
            if($request->has('test_remarks')){
                $student->test_remarks = $request->test_remarks;
            }
            if($request->has('test_score')){
                $student->test_score = $request->test_score;
            }
        $student->save();

       
        Session::flash('success','student updated successfully');
        return view('student.details')->with('student',$student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $student = studentProfile::find($id);
    //     $student->agent->students = $student->agent->students - 1;
    //     $student->agent->save();
    //     $student->lead->status=0;
    //     $student->lead->save();
    //     $student->forceDelete();
    //     Session::flash('success','Student Deleted!');
    //     return redirect()->route('students');
    // }
    public function details($id){
        // dd($id);
        $student = studentProfile::find($id);
        return view('student.details')->with('student',$student);
    }

    public function process($id){
        $student = studentProfile::find($id);
        return view('student.process')->with('student',$student);
    }
    public function processUpdate(Request $request, $id){
        $student = studentProfile::find($id);
        if ($request->application_fee != null) {
            $student->application_fee = $request->application_fee;
        }
        if ($request->tuition_fee != null) {
            $student->tuition_fee = $request->tuition_fee;
        }
        if ($request->st_ins_1 != null) {
            $student->st_ins_1 = $request->st_ins_1;
        }
        if ($request->st_ins_2 != null) {
            $student->st_ins_2 = $request->st_ins_2;
        }
        if ($request->st_ins_3 != null) {
            $student->st_ins_3 = $request->st_ins_3;
        }
        if ($request->st_ins_date != null) {
            $student->st_ins_date = $request->st_ins_date;
        }
        if ($request->nd_ins_1 != null) {
            $student->nd_ins_1 = $request->nd_ins_1;
        }
        if ($request->nd_ins_2 != null) {
            $student->nd_ins_2 = $request->nd_ins_2;
        }
        if ($request->nd_ins_3 != null) {
            $student->nd_ins_3 = $request->nd_ins_3;
        }
        if ($request->nd_ins_date != null) {
            $student->nd_ins_date = $request->nd_ins_date;
        }
        if ($request->rd_ins_1 != null) {
            $student->rd_ins_1 = $request->rd_ins_1;
        }
        if ($request->rd_ins_2 != null) {
            $student->rd_ins_2 = $request->rd_ins_2;
        }
        if ($request->rd_ins_3 != null) {
            $student->rd_ins_3 = $request->rd_ins_3;
        }
        if ($request->rd_ins_date != null) {
            $student->rd_ins_date = $request->rd_ins_date;
        }

        $student->LOA = $request->LOA;
        if ($request->Loa_date != null) {
            $student->Loa_date = $request->Loa_date;
        }
        $student->file_processing = $request->file_processing;
        $student->file_processed = $request->file_processed;
        $student->file_submission = $request->file_submission;
        if ($request->submission_date != null) {
            $student->submission_date = $request->submission_date;
        }
        $student->file_approved = $request->file_approved;
        if ($request->approved_date != null) {
            $student->approved_date = $request->approved_date;
        }
         $student->file_declined = $request->file_declined;
        if ($request->declined_date != null) {
            $student->declined_date = $request->declined_date;
        }
        if ($request->refund != null){
        $student->refund = $request->refund;}
        if ($request->refund_date != null) {
            $student->refund_date = $request->refund_date;
        }
        if ($request->document_received != null){
        $student->document_received = $request->document_received;
    }
        if ($request->document_received_date != null) {
            $student->document_received_date = $request->document_received_date;
        }
        if ($request->offer_letter != null){
        $student->offer_letter = $request->offer_letter;
    }
        if ($request->intake_session != null){
        $student->intake_session = $request->intake_session;
    }   
        if ($request->submission_to_visa != null){
        $student->submission_to_visa = $request->submission_to_visa;
    }
        if ($request->submission_to_visa_date != null) {
            $student->submission_to_visa_date = $request->submission_to_visa_date;
        }
        if ($request->offer_letter_date != null) {
            $student->offer_letter_date = $request->offer_letter_date;
        }
        $student->save();
        return redirect()->route('process',['id'=>$id]);
    }
    public function reapply($id){
        $student = studentProfile::find($id);
        $student->LOA = 'no';
        $student->Loa_date = null;
        $student->file_processing = 'no';
        $student->file_processed= 'no';
        $student->file_submission = 'no';
        $student->submission_date = null;
        $student->file_approved = 'no';
        $student->approved_date = null;
        $student->file_declined = 'no';
        $student->declined_date = null;
        $student->save();
        return redirect()->route('process',['id'=>$id]);
    }
}
