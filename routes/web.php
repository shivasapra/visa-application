<?php
use App\agentProfile;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//students

Route::get('/students',[
		'uses'=> 'StudentController@index',
		'as'=>'students'
	]);
Route::get('/student/create',[
		'uses'=> 'StudentController@create',
		'as'=>'students.create'
	]);
Route::post('/student/store',[
		'uses'=> 'StudentController@store',
		'as'=>'students.store'
	]);
Route::get('/student/delete/{id}',[
		'uses'=> 'StudentController@destroy',
		'as'=>'student.delete'
	]);
Route::get('/student/details/{id}',[
		'uses'=> 'StudentController@details',
		'as'=>'student.details'
	]);



//agents
Route::get('/agents',[
		'uses'=> 'AgentController@index',
		'as'=>'agents'
	]);
Route::get('/agent/create',[
		'uses'=> 'AgentController@create',
		'as'=>'agent.create'
	]);
Route::post('/agent/store',[
		'uses'=> 'AgentController@store',
		'as'=>'agent.store'
	]);

Route::get('/agent/business/{id}',[
        'uses' => 'AgentController@business',
        'as' => 'agent.business'
	]);

Route::get('/agent/studentList/{id}',[
        'uses' => 'AgentController@studentList',
        'as' => 'studentList'
	]);

Route::get('/agent/contracts/{id}',[
        'uses' => 'AgentController@contracts',
        'as' => 'agent.contracts'
	]);
Route::get('/agent/summary/{id}',[
        'uses' => 'AgentController@summary',
        'as' => 'summary'
	]);
Route::post('/update/summary/{id}',[
		'uses'=> 'AgentController@updateSummary',
		'as'=>'summary.update'
	]);
Route::get('/agent/files/{id}',[
        'uses' => 'AgentController@files',
        'as' => 'agent.files'
	]);

//leads
Route::get('/leads',[
		'uses'=> 'leadController@index',
		'as'=>'leads'
	]);
Route::get('/lead/create',[
		'uses'=> 'leadController@create',
		'as'=>'lead.create'
	]);
Route::post('/lead/store',[
		'uses'=> 'leadController@store',
		'as'=>'lead.store'
	]);
Route::get('/status/edit/{id}',[
		'uses'=> 'leadController@statusEdit',
		'as'=>'status.edit'
	]);
Route::post('/status/save/{id}',[
		'uses'=> 'leadController@statusSave',
		'as'=>'status.save'
	]);
Route::get('/add/student/{id}',[
		'uses'=> 'leadController@studentAdd',
		'as'=>'student.add'
	]);
Route::post('convert/lead/{id}',[
		'uses'=> 'leadController@convertLead',
		'as'=>'convert.lead'
	]);
Route::get('details/lead/{id}',[
		'uses'=> 'leadController@detailsLead',
		'as'=>'details.lead'
	]);
//
Route::get('files/progress',[
		'uses' =>'FilesController@index',
		'as' => 'files.progress'
	]);
//
Route::get('visa/index/',[
		'uses' =>'VisaController@index',
		'as' => 'visa.index'
	]);

Route::get('visa/create/{id}',[
		'uses' =>'VisaController@create',
		'as' => 'visa.create'
	]);

Route::post('/visa/store',[
		'uses'=> 'VisaController@store',
		'as'=>'visa.store'
	]);

Route::get('visa/details/{id}',[
		'uses' =>'VisaController@details',
		'as' => 'visa.details'
	]);

Route::get('visa/details/update/{id}',[
		'uses' =>'VisaController@detailsUpdate',
		'as' => 'visa.details.update'
	]);

Route::post('visa/update/{id}',[
		'uses' =>'VisaController@Update',
		'as' => 'visa.update'
	]);