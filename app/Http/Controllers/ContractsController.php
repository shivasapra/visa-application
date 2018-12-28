<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contracts;
use App\agentProfile;
use App\studentProfile;
use Session;
use Carbon\carbon;
class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $active = contracts::take(100000000000)->where('active','yes')->get();
        $signed = contracts::take(100000000000)->where('signed','yes')->get();
        $expired = contracts::take(100000000000)->where('expired','yes')->get();
        $declined = contracts::take(100000000000)->where('declined','yes')->get();
        return view('contract.index')->with('contracts',contracts::all())
                                    ->with('active',$active)
                                    ->with('signed',$signed)
                                    ->with('expired',$expired)
                                    ->with('declined',$declined);
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
           $dt = Carbon::now();
        $date_today = $dt->toDateString();
        return view('contract.create')->with('agents',agentProfile::all())
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
        if($request->percentage != 10 and $request->percentage != 15 
                and $request->percentage != 20){
                $this->validate($request,[
                    'percentage_'=>'required|integer',
                ]);
            }
        $this->validate($request,[
            'percentage' => 'required',
            'description' => 'required',
            'agent_id' =>'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $agent = agentProfile::find($request->agent_id);
        $contract = new contracts;
        
            if($request->percentage != 10 and $request->percentage != 15 
                and $request->percentage != 20){
                $contract->percentage = $request->percentage_;
            }
            else{
                $contract->percentage = $request->percentage;
            }
            $contract->description = $request->description;
            $contract->agent_id = $request->agent_id;
            $contract->start_date = $request->start_date;
            $contract->end_date = $request->end_date;
            $contract->active = 'yes';
            $contract->save();
        

        $agent->contracts = $agent->contracts + 1;
        $agent->active_c = 
        $agent->active_c = $agent->active_c +1;
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
        $contract = contracts::find($id);
        return view('contract.edit')->with('contract',$contract);
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
        if($request->percentage != 10 and $request->percentage != 15 
                and $request->percentage != 20){
                $this->validate($request,[
                    'percentage_'=>'required|integer',
                ]);
            }
        $this->validate($request,[
            'percentage' => 'required',
            'description' => 'required',
            'agent_id' =>'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $contract = contracts::find($id);
        if($request->percentage != 10 and $request->percentage != 15 
                and $request->percentage != 20){
                $contract->percentage = $request->percentage_;
            }
            else{
                $contract->percentage = $request->percentage;
            }
        $contract->description = $request->description;
        $contract->agent_id = $request->agent_id;
        $contract->start_date = $request->start_date;
        $contract->end_date = $request->end_date;
        $contract->save();
        Session::flash('success','contract created successfully');
        return redirect()->route("contracts");
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
        if ($contract->signed == 'yes') {
            if ($contract->expired == 'yes') {
                $contract->agent->expired_c = $contract->agent->expired_c - 1;
                $contract->agent->signed_c = $contract->agent->signed_c - 1;
            }
            else{
                $contract->agent->signed_c = $contract->agent->signed_c - 1;
                $contract->agent->active_c = $contract->agent->active_c - 1;
            }
        }
        elseif ($contract->active == 'yes') {
            $contract->agent->active_c = $contract->agent->active_c - 1;
        }
        elseif ($contract->declined == 'yes' ) {
            $contract->agent->declined_c = $contract->agent->declined_c - 1;
        }
        elseif ($contract->expired == 'yes' ) {
            $contract->agent->expired_c = $contract->agent->expired_c - 1;
        }
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
    public function sign($id)
    {
        $contract = contracts::find($id);
        return view('contract.sign')->with('contract',$contract);
    }
    public function signed(Request $request, $id)
    {   
         $this->validate($request,[
            'signed_fname' => 'required',
            'signed_lname' => 'required',
            'signed_email' => 'required|email',
        ]);

        $contract = contracts::find($id);
        $contract->signed_fname = $request->signed_fname;
        $contract->signed_lname = $request->signed_lname;
        $contract->signed_email = $request->signed_email;
        $contract->signed = 'yes';
        $contract->save();
        $contract->agent->signed_c = $contract->agent->signed_c + 1;
        $contract->agent->save();
        return redirect()->route('contracts');
    }
    public function decline($id)
    {
        $contract = contracts::find($id);
        $contract->declined = 'yes';
        $contract->active = 'no';
        $contract->save();
        $contract->agent->active_c = $contract->agent->active_c - 1;
        $contract->agent->declined_c = $contract->agent->declined_c + 1;
        $contract->agent->save();
        return view('contract.details')->with('contract',$contract);
    }
}
