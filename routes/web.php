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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/logged-in-user/{id}', [
    'uses' => 'UserController@loggedInUser',
    'as' => 'user.loggedInUser'
]);
Route::post('/jobapply', [
    'uses' => 'JobSeekerController@jobApply',
    'as' => 'jobseeker.jobapply'
]);
Route::get('/job/{id}/{title}', [
    'uses' => 'JobController@show',
    'as' => 'jobseeker.job'
]);

Route::group(['middleware' => 'guest'], function () {
	Route::get('/signin', [
	        'uses' => 'UserController@getSignin',
	        'as' => 'user.signin'
	    ]);
	Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
    ]);
});
Route::group(['prefix' => 'jobseeker'], function () {
	Route::group(['middleware' => 'guest'], function () {
		Route::get('/index',  [
	        'uses' => 'JobSeekerController@index',
	        'as' => 'jobseeker.index'
	    ]);
	    Route::get('/create', [
	        'uses' => 'UserController@jobSeekerCreate',
	        'as' => 'jobseeker.create'
	    ]);
		Route::post('/store', [
	        'uses' => 'UserController@store',
	        'as' => 'user.store'
	    ]);
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [
            'uses' => 'JobSeekerController@getProfile',
            'as' => 'jobseeker.profile'
        ]);

        Route::get('/logout', [
            'uses' => 'JobSeekerController@getLogout',
            'as' => 'jobseeker.logout'
        ]);
        Route::get('/appliedJobs', [
            'uses' => 'JobSeekerController@getAppliedJobs',
            'as' => 'jobseeker.appliedJobs'
        ]);
        Route::get('/edit',  [
            'uses' => 'JobSeekerController@edit',
            'as' => 'jobseeker.edit'
        ]);
        Route::post('/edit/{id}',  [
            'uses' => 'JobSeekerController@update',
            'as' => 'jobseeker.update'
        ]);
    });
});

Route::group(['prefix' => 'recruiter'], function () {
	Route::group(['middleware' => 'guest'], function () {
		Route::get('/index',  [
	        'uses' => 'RecruiterController@index',
	        'as' => 'recruiter.index'
	    ]);
	    Route::get('/create', [
	        'uses' => 'UserController@recruiterCreate',
	        'as' => 'recruiter.create'
	    ]);
		Route::post('/store', [
	        'uses' => 'UserController@store',
	        'as' => 'user.store'
	    ]);	
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [
            'uses' => 'RecruiterController@getProfile',
            'as' => 'recruiter.profile'
        ]);
        Route::get('/logout', [
            'uses' => 'RecruiterController@getLogout',
            'as' => 'recruiter.logout'
        ]);
        Route::get('/edit',  [
            'uses' => 'RecruiterController@edit',
            'as' => 'recruiter.edit'
        ]);
        Route::post('/edit/{id}',  [
            'uses' => 'RecruiterController@update',
            'as' => 'recruiter.update'
        ]);
        Route::get('/jobpost', [
            'uses' => 'JobController@create',
            'as' => 'recruiter.jobpost'
        ]);
        Route::get('/jobpostslist', [
            'uses' => 'RecruiterController@index',
            'as' => 'recruiter.jobpostslist'
        ]);
        Route::post('/jobpost', [
            'uses' => 'JobController@store',
            'as' => 'recruiter.jobstore'
        ]);
        Route::get('/delete/{id}/{title}', [
            'uses' => 'JobController@destroy',
            'as' => 'recruiter.jobdelete'
        ]);
        Route::get('/jobseekers-applied/{id}/{title}', [
            'uses' => 'JobController@jobSeekersApplied',
            'as' => 'recruiter.jobjobseekerapplied'
        ]);

    });
});

Auth::routes();