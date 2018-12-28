<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leads;
use App\agentProfile;
use App\studentProfile;
use Session;
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
        $agents = agentProfile::all();
       if($agents->count()==0)
           {

            Session::flash('info','You must have one agent to create a lead');
            return redirect()->back();
           }

        return view('leads.create')->with('agents',agentProfile::all());
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
            'description' => 'required',
            'email' => 'required|email',
            'agent_id' =>'required',
            'address' => 'required',
            'postal_code' => 'required',
            'Mobile' => 'required'
        ]);

        
        leads::create([
            'student_fname' => $request->student_fname,
            'student_lname' => $request->student_lname,
            'email' => $request->email,
            'Mobile' => $request->Mobile,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'agent_id' => $request->agent_id,
            'description' => $request->description,
        ]);
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
        return view('leads.studentAdd')->with('lead',$lead);
    }


    public function convertLead(Request $request,$id)
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
            'twelveth_stream' => 'required'
        ]);

        $agent = agentProfile::find($request->agent_id);
        studentProfile::create([
            'lead_id' => $id,
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
            'twelveth_stream' => $request->twelveth_stream
        ]);

        $agent->students = $agent->students + 1;
        $agent->save();
        $lead = leads::find($id);
        $lead->status = 2;
        $lead->save();
        Session::flash('success','lead converted! to student');
        return redirect()->route("students");
    }
    public function detailsLead($id){
        $lead = leads::find($id);
        $student = studentProfile::take(1)->where('lead_id',$id)->get();
        // dd($student);
        $student_id = $student[0]['id'];
        return redirect()->route('student.details',['id'=>$student_id]);
    }
}
