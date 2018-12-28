<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agentProfile;
use App\studentProfile;
use App\contracts;
use Carbon\carbon;
use App\leads;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $contracts = contracts::all();
        $dt = Carbon::now();
        $dt->timezone('Asia/Kolkata');
        $date_today = $dt->toDateString();

        // $i = 0;

        foreach ($contracts as $contract) {
            if ($contract->expired == 'no' and $contract->declined == 'no') {
                if ($contract->end_date < $date_today) {
                    // $i++;
                    $contract->expired = 'yes';
                    $contract->active = 'no';
                    $contract->agent->active_c = $contract->agent->active_c - 1 ;
                    $contract->agent->expired_c = $contract->agent->expired_c + 1 ;
                    $contract->agent->save();
                    $contract->save();
                } 
            }
        }
        // dd($i);
        return view('home')->with('agents',agentProfile::all())->with('students',studentProfile::all())
                            ->with('leads',leads::all());
    }
}
