<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agentProfile;
use App\studentProfile;
use Session;
use App\contracts;
use App\identity;
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
            // 'id_proof' => 'required',
            // 'photo' => 'required',
            // 'license'=>'required',
            'location' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            
            'company' => 'required',
            'designation' => 'required',
            'state' => 'required',
            'district' => 'required',
            'website' => 'required',
            'photos_received' => 'required',
            'id_name' => 'required',
            'id_no' => 'required',
            
            
        ]);
        // $id_proof= $request->id_proof;
        // $id_proof_new_name = time().$id_proof->getClientOriginalName();
        // $id_proof->move('uploads/agents',$id_proof_new_name);
        
        // $photo= $request->photo;
        // $photo_new_name = time().$photo->getClientOriginalName();
        // $photo->move('uploads/agents',$photo_new_name);

        // $license= $request->license;
        // $license_new_name = time().$license->getClientOriginalName();
        // $license->move('uploads/agents',$license_new_name);
            $agent = new agentProfile;
            $agent->name = $request->name;
            $agent->email = $request->email;
            // 'id_proof' => 'uploads/agents/'.$id_proof_new_name,
            // 'photo' => 'uploads/agents/'.$photo_new_name,
            // 'license' => 'uploads/agents/'.$license_new_name,
            $agent->location = $request->location;
            $agent->mobile = $request->mobile;
            $agent->address = $request->address;
            $agent->postal_code = $request->postal_code;
            
            $agent->company = $request->company;
            $agent->designation = $request->designation;
            $agent->state = $request->state;
            $agent->district = $request->district;
            $agent->website = $request->website;
            $agent->photos_received = $request->photos_received;
            if($request->has('reference1_name'))
            {
                $agent->reference1_name = $request->reference1_name;
            }
            if($request->has('reference1_phone'))
            {
                $agent->reference1_phone = $request->reference1_phone;
            }
            if($request->has('reference1_email'))
            {
                $agent->reference1_email = $request->reference1_email;
            }
            if($request->has('reference1_contact'))
            {
                $agent->reference1_contact = $request->reference1_contact;
            }
            if($request->has('reference1_website'))
            {
                $agent->reference1_website = $request->reference1_website;
            }
            if($request->has('reference2_name'))
            {
                $agent->reference2_name = $request->reference2_name;
            }
            if($request->has('reference2_phone'))
            {
                $agent->reference2_phone = $request->reference2_phone;
            }
            if($request->has('reference2_email'))
            {
                $agent->reference2_email = $request->reference2_email;
            }
            if($request->has('reference2_contact'))
            {
                $agent->reference2_contact = $request->reference2_contact;
            }
            if($request->has('reference1_website'))
            {
                $agent->reference2_website = $request->reference2_website;
            }

            $agent->save();
            // dd($request->id_name->pluck('id_name'));
            // dd('name');
            foreach ($request->id_name as $id_name) {
                $identity = new identity;
                $identity->agent_id = $agent->id;
                $identity->id_name = $id_name;
                $identity->save();
            }
            
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
        $agent = agentProfile::find($id);
        $identity = identity::where('agent_id',$id)->get();
        return view('agent.edit')->with('agent',$agent)
                                ->with('identity',$identity);
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
        $agent = agentProfile::find($id);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            // 'id_proof' => 'required',
            // 'photo' => 'required',
            // 'license'=>'required',
            'location' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            
            'company' => 'required',
            'designation' => 'required',
            'state' => 'required',
            'district' => 'required',
            'website' => 'required',
            'photos_received' => 'required',
            'id_name' => 'required',
            'id_no' => 'required',
            
            

        ]);
        // $id_proof= $request->id_proof;
        // $id_proof_new_name = time().$id_proof->getClientOriginalName();
        // $id_proof->move('uploads/agents',$id_proof_new_name);
        
        // $photo= $request->photo;
        // $photo_new_name = time().$photo->getClientOriginalName();
        // $photo->move('uploads/agents',$photo_new_name);

        // $license= $request->license;
        // $license_new_name = time().$license->getClientOriginalName();
        // $license->move('uploads/agents',$license_new_name);
        
        
         
            $agent->name = $request->name;
            $agent->email = $request->email;
            // 'id_proof' => 'uploads/agents/'.$id_proof_new_name,
            // 'photo' => 'uploads/agents/'.$photo_new_name,
            // 'license' => 'uploads/agents/'.$license_new_name,
            $agent->location = $request->location;
            $agent->mobile = $request->mobile;
            $agent->address = $request->address;
            $agent->postal_code = $request->postal_code;
            
            $agent->company = $request->company;
            $agent->designation = $request->designation;
            $agent->state = $request->state;
            $agent->district = $request->district;
            $agent->website = $request->website;
            $agent->photos_received = $request->photos_received;
            if($request->has('reference1_name'))
            {
                $agent->reference1_name = $request->reference1_name;
            }
            if($request->has('reference1_phone'))
            {
                $agent->reference1_phone = $request->reference1_phone;
            }
            if($request->has('reference1_email'))
            {
                $agent->reference1_email = $request->reference1_email;
            }
            if($request->has('reference1_contact'))
            {
                $agent->reference1_contact = $request->reference1_contact;
            }
            if($request->has('reference1_website'))
            {
                $agent->reference1_website = $request->reference1_website;
            }
            if($request->has('reference2_name'))
            {
                $agent->reference2_name = $request->reference2_name;
            }
            if($request->has('reference2_phone'))
            {
                $agent->reference2_phone = $request->reference2_phone;
            }
            if($request->has('reference2_email'))
            {
                $agent->reference2_email = $request->reference2_email;
            }
            if($request->has('reference2_contact'))
            {
                $agent->reference2_contact = $request->reference2_contact;
            }
            if($request->has('reference2_website'))
            {
                $agent->reference2_website = $request->reference2_website;
            }
            
            $agent->save(); 
            foreach ($request->id_name as $id_name) {
                $identity = new identity;
                $identity->agent_id = $agent->id;
                $identity->id_name = $id_name;
                $identity->save();
            } 

        Session::flash('success','agent update successfully');
        return redirect()->back()->with('agent',$agent);
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
    {   
        // $student = new studentProfile;
        $students = studentProfile::where('agent_id',$id)->get();
        $agent = agentProfile::find($id);

        // dd($students);
        // $students = agentProfile::students();
        return view('agent.studentList')->with('students',$students)->with('agent',$agent);
    }

    public function contracts($id)
    {
        $agent = agentProfile::find($id);
        $contracts = contracts::where('agent_id',$id)->get();
        $total = $contracts->count();
        return view('agent.agentContracts')->with('contracts',$contracts)
                                            ->with('agent',$agent)
                                            ->with('total',$total);
    }
    public function active_c($id)
    {
        $agent = agentProfile::find($id);
        $contracts = contracts::where('agent_id',$id)->get();
        $active = contracts::where('agent_id',$id)->where('active','yes')->get();
        $total = $contracts->count();
        return view('agent.agentContracts')->with('contracts',$active)
                                            ->with('agent',$agent)
                                            ->with('total',$total);
    }
    public function expired_c($id)
    {
        $agent = agentProfile::find($id);
        $contracts = contracts::where('agent_id',$id)->get();
        $expired = contracts::where('agent_id',$id)->where('expired','yes')->get();
        $total = $contracts->count();
        return view('agent.agentContracts')->with('contracts',$expired)
                                            ->with('agent',$agent)
                                            ->with('total',$total);
    }
    public function declined_c($id)
    {
        $agent = agentProfile::find($id);
        $contracts = contracts::where('agent_id',$id)->get();
        $declined = contracts::where('agent_id',$id)->where('declined','yes')->get();
        $total = $contracts->count();
        return view('agent.agentContracts')->with('contracts',$declined)
                                            ->with('agent',$agent)
                                            ->with('total',$total);
    }
    public function signed_c($id)
    {
        $agent = agentProfile::find($id);
        $contracts = contracts::where('agent_id',$id)->get();
        $signed = contracts::where('agent_id',$id)->where('signed','yes')->get();
        $total = $contracts->count();
        return view('agent.agentContracts')->with('contracts',$signed)
                                            ->with('agent',$agent)
                                            ->with('total',$total);
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
        $agent->document_received = $request->document_received;
        
        $agent->agreement_signed_agent = $request->agreement_signed_agent;
        $agent->agreement_signed_agent_date = $request->agreement_signed_agent_date;

        $agent->agreement_sent = $request->agreement_sent;
        $agent->agreement_sent_date = $request->agreement_sent_date;

        $agent->agreement_signed_college = $request->agreement_signed_college;
        $agent->agreement_signed_college_date = $request->agreement_signed_college_date;

        $agent->certificate_issued = $request->certificate_issued;
        $agent->certificate_issued_date = $request->certificate_issued_date;
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
        $identity = identity::where('agent_id',$id)->get();
        return view('agent.details')->with('agent',$agent)
                                    ->with('identity',$identity);
    }
}
