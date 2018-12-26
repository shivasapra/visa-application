<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agentProfile;
use App\studentProfile;
use Session;
class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agent.index')->with('agents',agentProfile::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'id_proof' => 'required',
            'photo' => 'required',
            'license'=>'required',
            'location' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'id_no' =>'required',
            'license_no' => 'required',
            'company' => 'required',
            'designation' => 'required',
            'state' => 'required',
            'district' => 'required',
            'website' => 'required',
            'college1' => 'required',
            'college2' => 'required',
        ]);
        $id_proof= $request->id_proof;
        $id_proof_new_name = time().$id_proof->getClientOriginalName();
        $id_proof->move('uploads/agents',$id_proof_new_name);
        
        $photo= $request->photo;
        $photo_new_name = time().$photo->getClientOriginalName();
        $photo->move('uploads/agents',$photo_new_name);

        $license= $request->license;
        $license_new_name = time().$license->getClientOriginalName();
        $license->move('uploads/agents',$license_new_name);
        
        
         agentProfile::create([
            'name' => $request->name,
            'email' => $request->email,
            'id_proof' => 'uploads/agents/'.$id_proof_new_name,
            'photo' => 'uploads/agents/'.$photo_new_name,
            'license' => 'uploads/agents/'.$license_new_name,
            'location' => $request->location,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'license_no' =>$request->license_no,
            'id_no' => $request->id_no,
            'company' => $request->company,
            'designation' => $request->designation,
            'state' => $request->state,
            'district' => $request->district,
            'website' => $request->website,
            'college1' => $request->college1,
            'college2' => $request->college2,
                    ]);
        Session::flash('success','agent created successfully');
        return redirect()->route("agents");
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

    public function business($id)
    {   
        $agent = agentProfile::find($id);
        return view('agent.business')->with('agent',$agent);

    }
    public function studentList($id)
    {   $student = new studentProfile;
        $students = $student->take(10)->where('agent_id',$id)->get();
        $agent = agentProfile::find($id);

        // dd($students);
        // $students = agentProfile::students();
        return view('agent.studentList')->with('students',$students)->with('agent',$agent);
    }

    public function contracts($id)
    {
        $agent = agentProfile::find($id);

        return view('agent.agentContracts')->with('agent',$agent);
    }

    public function summary($id)
    {   
        $agent = agentProfile::find($id);
        return view('agent.summary')->with('agent',$agent);
    }

    public function updateSummary(Request $request, $id){
        $agent = agentProfile::find($id);
        $agent->interested = $request->interested;
        $agent->proposal_sent = $request->proposal_sent;
        $agent->agreement_signed_agent = $request->agreement_signed_agent;
        $agent->agreement_sent = $request->agreement_sent;
        $agent->agreement_signed_college = $request->agreement_signed_college;
        $agent->agreement_signed_date = $request->agreement_signed_date;
        $agent->save();
        Session::flash('success','Summary updated successfully');
        return redirect()->route('agents');

    }
    public function files($id)
    {
        $agent = agentProfile::find($id);
        return view('agent.agentFiles')->with('agent',$agent);
    }
    public function details($id){
        // dd($id);
        $agent = agentProfile::find($id);
        return view('agent.details')->with('agent',$agent);
    }
}
