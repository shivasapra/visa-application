<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leads;
use App\agentProfile;
use App\studentProfile;
use Session;
use Carbon\Carbon;
use App\social;
use App\education;
class leadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leads.index')->with('leads',leads::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leads.create')->with('agents',agentProfile::all())
                                    ->with('socials',social::all());
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
            'student_fname' => 'required',
            'student_lname' => 'required',
            'Mobile' => 'required'
        ]);

        
        $lead = new leads;
        if ($request->source == 'social') {
            $lead->social_id = $request->idd;
        }
        if ($request->source == 'third_party') {
            $lead->third_party = $request->third_party;
        }
        if ($request->source == 'agent') {
            $lead->agent_id = $request->idd;
        }
            $lead->student_fname = $request->student_fname;
            $lead->student_lname = $request->student_lname;
            $lead->Mobile = $request->Mobile;
        
                $lead->email = $request->email;
            
            
            $lead->address = $request->address;
            $lead->state = $request->state;
            $lead->district = $request->district;
            $lead->city = $request->city;
        
            
            $lead->postal_code = $request->postal_code;
        
            
            $lead->description = $request->description;
            $lead->interested = $request->StatuS;
            $lead->StatuS_info = $request->StatuS_info;
        $lead->save();
        
        Session::flash('success','new lead created ');
        return redirect()->route('leads');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('leads.show')->with('lead',leads::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('leads.edit')->with('lead',leads::find($id));
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
        $lead = leads::find($id);
        if ($request->source == 'social') {
            $lead->social_id = $request->idd;
        }
        if ($request->source == 'third_party') {
            $lead->third_party = $request->third_party;
        }
        if ($request->source == 'agent') {
            $lead->agent_id = $request->idd;
        }
            $lead->student_fname = $request->student_fname;
            $lead->student_lname = $request->student_lname;
            $lead->Mobile = $request->Mobile;
        
                $lead->email = $request->email;
            
            
            $lead->address = $request->address;
            $lead->state = $request->state;
            $lead->district = $request->district;
            $lead->city = $request->city;
        
            
            $lead->postal_code = $request->postal_code;
        
            
            $lead->description = $request->description;
            $lead->interested = $request->StatuS;
            $lead->StatuS_info = $request->StatuS_info;
        $lead->save();
        
        Session::flash('success','lead updated ');
        return redirect()->route('lead.show',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function statusEdit($id)
    {
        $lead = leads::find($id);
        return view('leads.statusEdit')->with('lead',$lead);
    }
    public function statusSave(Request $request,$id)
    {
        $lead = leads::find($id);
        // dd($request->status);
        $lead->status = $request->status;
        $lead->save();
        Session::flash('success','Status Changed');
        return redirect()->route('leads');
    }

    public function studentAdd($id){
        $lead = leads::find($id);
        $dt = Carbon::now();
        $dt->timezone('Asia/Kolkata');
        $date_today = $dt->toDateString();
        return view('leads.studentAdd')->with('lead',$lead)
                                        ->with('socials',social::all())
                                    ->with('date_today',$date_today);
    }


    public function convertLead(Request $request,$id)
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
            $student->agent_percentage = agentProfile::find($request->idd)->percentage;
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
            $student->lead_id = $id;
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->gender = $request->gender;
            $student->title = $request->title;
            $student->first_language = $request->first_language;
            $student->DOB = $request->DOB;
            $student->Mobile = $request->Mobile;
            $student->address = $request->address;
            $student->state = $request->state;
            $student->district = $request->district;
            $student->city = $request->city;
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
        if($request->education != null){
        foreach($request->education as $index => $education){
                $neweducation = new education;
                $neweducation->education = $education;
                $neweducation->college_name = $request->college_name[$index];
                $neweducation->percentage = $request->percentage[$index];
                $neweducation->passing_year = $request->passing_year[$index];
                $neweducation->student_id = $student->id;
                $neweducation->save();
            }}

        $lead = leads::find($id);
        $lead->status = 2;
        $lead->save();
        Session::flash('success','lead converted! to student');

        return redirect()->route("students");
    }
    public function detailsLead($id){
        $lead = leads::find($id);
        $student = studentProfile::where('lead_id',$id)->get();
        // dd($student);
        $student_id = $student[0]['id'];
        return redirect()->route('student.details',['id'=>$student_id]);
    }
}
