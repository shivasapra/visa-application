<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leads;
use App\agentProfile;
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
        return redirect()->route('leads');
    }

    public function studentAdd($id){
        $lead = leads::find($id);
        return view('leads.studentAdd')->with('lead',$lead);
    }
}
