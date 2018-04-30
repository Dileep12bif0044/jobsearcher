<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\JobJobSeeker;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
    	if (Auth::check()) {
    		$jobs = JobJobSeeker::join('users', 'users.id', '=', 'job_job_seekers.user_id')
                                ->join('jobs', 'jobs.id', '=', 'job_job_seekers.job_id')
                                ->where('users.id', Auth::user()->id)
                                ->select('jobs.*')
                                ->get()->pluck('id');
            $jobs = Job::whereNotIn('id', $jobs)->latest()->get();
    		return view('index', compact('jobs'));
        }
        else {
        	$jobs = Job::latest()->get();
        	return view('index', compact('jobs'));
        }
    }
}
