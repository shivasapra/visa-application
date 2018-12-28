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
    {   $agents = agentProfile::all();
        
        if($agents->count()==0)
           {

            Session::flash('info','You must have one agent to create a student');
            return redirect()->back();
           }
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
            'agent_id' =>'required',
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
        ]);

        $agent = agentProfile::find($request->agent_id);
        studentProfile::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'title' => $request->title,
            'first_language' => $request->first_language,
            'DOB' => $request->DOB,
            'Mobile' => $request->Mobile,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'agent_id' => $request->agent_id,
            'passport_no' => $request->passport_no,
            'passport_issue' => $request->passport_issue,
            'passport_expire' => $request->passport_expire,
            'passport_country' => $request->passport_country,
            'tenth_percentage' => $request->tenth_percentage,
            'twelveth_percentage' => $request->twelveth_percentage,
            'tenth_year' => $request->tenth_year,
            'twelveth_year' => $request->twelveth_year,
            'tenth_board' => $request->tenth_board,
            'twelveth_board' => $request->twelveth_board,
            'twelveth_stream' => $request->twelveth_stream,

        ]);

        $agent->students = $agent->students + 1;
        $agent->save();
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
        //
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
        //
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
}
