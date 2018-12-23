<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentProfile;
use App\visa;
use Session;
class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visas = visa::all();
        $students = studentProfile::all();
        $total_approved = 0;
        $total_rejected = 0;
        $total_re_applied = 0;
            
        foreach ($students as $student) {
            $total_approved = $total_approved + $student->visa_approved;
            $total_rejected = $total_rejected + $student->visa_rejected;
            $total_re_applied = $total_re_applied + $student->visa_re_applied;
        }
        return view('visa.index')->with('visas',$visas)
                            ->with('total_approved',$total_approved)
                            ->with('total_rejected',$total_rejected)
                            ->with('total_re_applied',$total_re_applied);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = studentProfile::find($id);
        return view('visa.create')->with('student',$student);
    }

    public function details($id)
    {   
        $student = studentProfile::find($id);
        $visas = visa::take(100)->where('student_id',$id)->get();
        return view('visa.details')->with('visas',$visas)
                                    ->with('student',$student);
    }

    public function detailsUpdate($id){
        
        $visa = visa::find($id);
        $visa->re_apply = 'yes';
        $visa->approved = 'no';
        $visa->rejected = 'no';
        $visa->save();
        $visa->student->visa_re_applied = $visa->student->visa_re_applied + 1 ;
        $visa->student->save(); 
        Session::flash('success','Re-applied');
        return redirect()->route('students');
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
            'travel_to' => 'required',
            'student_id' => 'required',
        ]);
        $visa = new visa;
        $visa->student_id = $request->student_id;
        $visa->travel_to = $request->travel_to;
        $visa->save();
        Session::flash('success','Applied');
        return redirect()->route('students');
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
    public function approve(Request $request, $id)
    {
        $visa = visa::find($id);
        // $approved = "approved".$id;
        // $rejected = 'rejected'.$id;
        // $final_id = $test_id + $r
        // dd($request->approved);
        // approved{{$visa->id}}
        $visa->approved = 'yes';
        $visa->student->visa_approved = $visa->student->visa_approved + 1;
        
        // $visa->approved = $request->$approved;
        // $visa->rejected = $request->$rejected;
        $visa->save();
        // if ($request->$approved == 'yes') {
        //     $visa->student->visa_approved = $visa->student->visa_approved + 1;
        //     }
        // if ($request->$rejected == 'yes') {
        //     $visa->student->visa_rejected = $visa->student->visa_rejected + 1;
        //     }
        $visa->student->save();



        $visas = visa::all();
        $students = studentProfile::all();
        $total_approved = 0;
        $total_rejected = 0;
        $total_re_applied = 0;
            
        foreach ($students as $student) {
            $total_approved = $total_approved + $student->visa_approved;
            $total_rejected = $total_rejected + $student->visa_rejected;
            $total_re_applied = $total_re_applied + $student->visa_re_applied;
        }
        return view('visa.index')->with('visas',$visas)
                            ->with('total_approved',$total_approved)
                            ->with('total_rejected',$total_rejected)
                            ->with('total_re_applied',$total_re_applied);

    }
    public function reject(Request $request, $id)
    {
        $visa = visa::find($id);
        // $approved = "approved".$id;
        // $rejected = 'rejected'.$id;
        // $final_id = $test_id + $r
        // dd($request->approved);
        // approved{{$visa->id}}
        $visa->rejected = 'yes';
        $visa->student->visa_rejected = $visa->student->visa_rejected + 1;
        
        // $visa->approved = $request->$approved;
        // $visa->rejected = $request->$rejected;
        $visa->save();
        // if ($request->$approved == 'yes') {
        //     $visa->student->visa_approved = $visa->student->visa_approved + 1;
        //     }
        // if ($request->$rejected == 'yes') {
        //     $visa->student->visa_rejected = $visa->student->visa_rejected + 1;
        //     }
        $visa->student->save();



        $visas = visa::all();
        $students = studentProfile::all();
        $total_approved = 0;
        $total_rejected = 0;
        $total_re_applied = 0;
            
        foreach ($students as $student) {
            $total_approved = $total_approved + $student->visa_approved;
            $total_rejected = $total_rejected + $student->visa_rejected;
            $total_re_applied = $total_re_applied + $student->visa_re_applied;
        }
        return view('visa.index')->with('visas',$visas)
                            ->with('total_approved',$total_approved)
                            ->with('total_rejected',$total_rejected)
                            ->with('total_re_applied',$total_re_applied);

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
}
