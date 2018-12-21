<?php

namespace App\Http\Controllers;
use App\agentProfile;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index(){
    	$agents = agentProfile::all();
    	// $files = [
    			$total_files = 0;
				$files_not_started = 0;
				$files_in_process = 0;
				$files_in_hold = 0;
				$files_finished = 0;
				$files_canceled = 0;
			// ];
    	foreach ($agents as $agent) {
    		$total_files = $total_files + $agent->total_files;
    		$files_not_started = $files_not_started + $agent->files_not_started;
    		$files_in_process = $files_in_process + $agent->files_in_process;
    		$files_in_hold = $files_in_hold + $agent->files_in_hold;
    		$files_finished = $files_finished + $agent->files_finished;
    		$files_canceled = $files_canceled + $agent->files_canceled;
    	}
    	return view('files')->with('total_files',$total_files)
    						->with('files_not_started',$files_not_started)
    						->with('files_in_process',$files_in_process)
    						->with('files_in_hold',$files_in_hold)
    						->with('files_finished',$files_finished)
    						->with('files_canceled',$files_canceled);
				
    }
}
