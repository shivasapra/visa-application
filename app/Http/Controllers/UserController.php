<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        return view('profile')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request,[
            'name' =>'required',
            'email' => 'required|email',

        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        
        if($request->hasFile('avatar'))
        {
            // dd('true');
        $avatar = $request->avatar;
        $avatar_new_name = time().$avatar->getClientOriginalName();
        $avatar->move('uploads/profile',$avatar_new_name);
        $user->avatar = 'uploads/profile/'.$avatar_new_name;
        $user->save();
        }
        if($request->password != null)
        {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        $user->save();
        return redirect()->back()->with('user',$user);
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
