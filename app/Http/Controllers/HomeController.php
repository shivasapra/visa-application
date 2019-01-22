<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agentProfile;
use App\studentProfile;
use App\contracts;
use Carbon\carbon;
use App\leads;
use App\todo;
use Session;
use sweetalert;

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

        $time_now =Carbon::now()->timezone('Asia/Kolkata')->format('h:i');
        // dd($time_now);
        //
            $all_todos = todo::all();
            foreach ($all_todos as $todo) {
                if ($todo->status != 1) {
                
                    if ($todo->date < $date_today) {
                        $todo->status = 3;  //misssed
                    }
                    if ($todo->date == $date_today and $todo->time < $time_now) {
                        $todo->status = 2;  //delayed
                    }
                }
                $todo->save();
            }




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
        $students = studentProfile::all();
        $application_fee = 0;
        foreach ($students as $student) {
            $application_fee = $application_fee + $student->application_fee;
        }
        $tuition_fee = 0;
        foreach ($students as $student) {
            $tuition_fee = $tuition_fee + $student->tuition_fee;
        }
        // dd($lead_ten);
        // dd($i);
        $offer_letter = studentProfile::where('offer_letter', 'yes')->get();
        $LOA = studentProfile::where('LOA', 'yes')->get();
        $visa_sub = studentProfile::where('submission_to_visa', 'yes')->get();
        $refund = studentProfile::where('refund', 'yes')->get();
        $application = studentProfile::where('application_fee', '!=', null)->orderBy('created_at','desc')->take(5)->get();
        $tuition = studentProfile::where('tuition_fee', '!=', null)->orderBy('created_at','desc')->take(5)->get();
        $todos = todo::where('date',$date_today)->orderBy('created_at','desc')->take(6)->get();
        $interested_leads = leads::where('interested', 'interested')->get();
        $not_interested_leads = leads::where('interested', 'Not-interested')->get();
        $follow_up_leads = leads::where('interested', 'Follow-up')->get();
        // dd($todos);
        return view('home')->with('agents',agentProfile::all())->with('students',$students)
                            ->with('leads',leads::all())
                            ->with('contracts',contracts::all())
                            ->with('agent_five',$agent_five)
                            ->with('students_ten',$student_ten)
                            ->with('lead_ten',$lead_ten)
                            ->with('offer_letter',$offer_letter)
                            ->with('LOA',$LOA)
                            ->with('visa_sub',$visa_sub)
                            ->with('refund',$refund)
                            ->with('application_fee',$application_fee)
                            ->with('tuition_fee',$tuition_fee)
                            ->with('application',$application)
                            ->with('tuition',$tuition)
                            ->with('date',$date_today)
                            ->with('time',$time_now)
                            ->with('todos',$todos)
                            ->with('interested_leads',$interested_leads)
                            ->with('not_interested_leads',$not_interested_leads)
                            ->with('follow_up_leads',$follow_up_leads);
    }


    public function addTodo(Request $request){
        $todo = new todo;
        // dd();
        $todo->date = $request->date;
        $todo->time = $request->time;
        $todo->activity = $request->activity;
        $todo->save();
        return redirect()->route('home');
    }

    public function updateTodo(Request $request,$id){
        $todo = todo::find($id);
            $todo->status = 1;
            $todo->save();
        return redirect()->route('home');
    }


    public function todos(Request $request){
        $dt = Carbon::now();
        $dt->timezone('Asia/Kolkata');
        $date_today = $dt->toDateString();
        $time_now =Carbon::now()->timezone('Asia/Kolkata')->format('h:i');
        $todos = todo::where('date',$request->date)->orderBy('created_at','desc')->get();
        return view('todo')->with('todos',$todos)
                            ->with('date_today',$date_today)
                            ->with('time',$time_now)
                            ->with('date',$request->date);
    }

    public function pastWeekTodos(Request $request){
        $dt = Carbon::now();
        $dt->timezone('Asia/Kolkata');
        $time_now =Carbon::now()->timezone('Asia/Kolkata')->format('h:i');
        $week_start_date = $dt->addDays(-7)->toDateString();
        // dd($week_start_date);
        $date_today = Carbon::now()->toDateString();
        $todos = todo::whereBetween('date',[$week_start_date,$date_today])->orderBy('date','desc')->get();
        $date = null;
        // dd($todos);
        return view('todo')->with('todos',$todos)
                            ->with('time',$time_now)
                            ->with('date_today',$date_today)
                            ->with('week_start_date',$week_start_date)
                            ->with('date',$date);
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