<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agentProfile;
use App\studentProfile;
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
            'license'=>'required'
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
        ]);
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
}
