<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contracts;
use App\agentProfile;
use App\studentProfile;
use Session;
class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contract.index')->with('contracts',contracts::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents= agentProfile::all();
        if($agents->count()==0)
           {

            Session::flash('info','You must have some agents to create a student');
            return redirect()->back();
           }
        return view('contract.create')->with('agents',agentProfile::all());
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
            'subject' => 'required',
            'contract_value' => 'required',
            'description' => 'required',
            'agent_id' =>'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $agent = agentProfile::find($request->agent_id);
        contracts::create([
            'subject' => $request->subject,
            'contract_value' => $request->contract_value,
            'description' => $request->description,
            'agent_id' => $request->agent_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $agent->contracts = $agent->contracts + 1;
        $agent->save();
        Session::flash('success','contract created successfully');
        return redirect()->route("contracts");
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
        $contract = contracts::find($id);
        $contract->agent->contracts = $contract->agent->contracts - 1;
        $contract->agent->save();
        $contract->forceDelete();
        Session::flash('success','Contract Deleted!');
        return redirect()->route('contracts');
    }
    public function details($id){
        // dd($id);
        $contract = contracts::find($id);
        return view('contract.details')->with('contract',$contract);
    }
}
