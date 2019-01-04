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
        $agent_five = agentProfile::orderBy('created_at','desc')->take(5)->get();
        $lead_ten = leads::orderBy('created_at','desc')->take(5)->get();
        $student_ten = studentProfile::orderBy('created_at','desc')->take(5)->get();
        // dd($lead_ten);
        // dd($i);
        return view('home')->with('agents',agentProfile::all())->with('students',studentProfile::all())
                            ->with('leads',leads::all())
                            ->with('contracts',contracts::all())
                            ->with('agent_five',$agent_five)
                            ->with('students_ten',$student_ten)
                            ->with('lead_ten',$lead_ten);
    }
}

// $number = htmlspecialchars($_GET["number"]);
// if(is_numeric($number) && $number > 0){
//     echo "<table>";
//     for($i=0; $i<11; $i++){
//         echo "<tr>";
//             echo "<td>$number x $i</td>";
//             echo "<td>=</td>";
//             echo "<td>" . $number * $i . "</td>";
//         echo "</tr>";
//     }
//     echo "</table>";
// }

// &nbsp;
// Vineet&nbsp;Chauhan