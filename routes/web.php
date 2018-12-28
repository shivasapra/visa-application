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

Route::get('/test', function () {
    return view('layouts.test');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/edit/profile',[
			'uses'=> 'UserController@index',
			'as'=>'edit.profile'
		]);
Route::post('/update/profile',[
			'uses'=> 'UserController@update',
			'as'=>'update.profile'
		]);
//contracts
	Route::get('/contracts',[
				'uses'=> 'ContractsController@index',
				'as'=>'contracts'
			]);
	Route::get('/contract/create',[
				'uses'=> 'ContractsController@create',
				'as'=>'contract.create'
			]);
	Route::post('/contract/store',[
				'uses'=> 'ContractsController@store',
				'as'=>'contract.store'
			]);
	Route::get('/contract/delete/{id}',[
				'uses'=> 'ContractsController@destroy',
				'as'=>'contract.delete'
			]);
	Route::get('/contract/details/{id}',[
				'uses'=> 'ContractsController@details',
				'as'=>'contract.details'
			]);
	Route::get('/contract/sign/{id}',[
				'uses'=> 'ContractsController@sign',
				'as'=>'contract.sign'
			]);
	Route::post('/contract/signed/{id}',[
				'uses'=> 'ContractsController@signed',
				'as'=>'contract.signed'
			]);
	Route::get('/edit/contract/{id}',[
			'uses'=> 'ContractsController@edit',
			'as'=>'contract.edit'
		]);
	Route::post('/update/contract/{id}',[
			'uses'=> 'ContractsController@update',
			'as'=>'update.contract'
		]);
	Route::get('/contract/decline/{id}',[
				'uses'=> 'ContractsController@decline',
				'as'=>'contract.decline'
			]);
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
	// Route::get('/student/delete/{id}',[
	// 		'uses'=> 'StudentController@destroy',
	// 		'as'=>'student.delete'
	// 	]);
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
	Route::get('/agent/details/{id}',[
			'uses'=> 'AgentController@details',
			'as'=>'agent.details'
		]);
	Route::get('/agent/edit/{id}',[
			'uses'=> 'AgentController@edit',
			'as'=>'edit.agent'
		]);
	Route::post('/agent/update/{id}',[
			'uses'=> 'AgentController@update',
			'as'=>'update.agent'
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

	Route::get('visa/reject/{id}',[
			'uses' =>'VisaController@reject',
			'as' => 'visa.reject'
		]);
	Route::get('visa/approve/{id}',[
			'uses' =>'VisaController@approve',
			'as' => 'visa.approve'
		]);