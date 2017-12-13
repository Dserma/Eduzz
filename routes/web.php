<?php

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

Route::group([ 
	'prefix' => '/'
], function()
{
    Route::get('/', [
        'as' => 'index',
        'uses' => 'Candidates\CandidateController@Index'
    ]);
    
    Route::get('/get', [
        'as' => 'ajax.get',
        'uses' => 'Candidates\CandidateController@Get'
    ]);

    Route::post('/new', [
        'as' => 'ajax.new',
        'uses' => 'Candidates\CandidateController@Insert'
    ]);
    
    Route::post('/delete', [
        'as' => 'ajax.delete',
        'uses' => 'Candidates\CandidateController@Delete'
    ]);
});


