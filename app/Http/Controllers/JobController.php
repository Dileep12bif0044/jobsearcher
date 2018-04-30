<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\User;
use App\Models\JobJobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobPostCreateRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recruiter.jobpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JobPostCreateRequest $request)
    {   
        $job = new Job();
        $job->user_id = Auth::user()->id;
        $job->job_title = $request->job_title;
        $job->company_name = $request->company_name;
        $job->skills = $request->skills;
        $job->salary = $request->salary;
        $job->job_description = $request->job_description;
        $job->address = $request->address;
        $job->location = $request->location;
        $job->country = $request->country;
        if ($job->save()) {
            session()->flash('message', 'Job posted successfully');
            return redirect()->route('recruiter.jobpost');
        }
        redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id, $title)
    {
        $job = Job::join('users', 'users.id', '=', 'jobs.user_id')
                    ->where('jobs.id', $id)
                    ->select('users.first_name', 'users.last_name', 'users.email', 'jobs.*')
                    ->first();
        if (Auth::check()) {
            if (Auth::user()->user_type == 1) {
                return view('jobseeker.appliedjob', compact('job'));
            }
            elseif (Auth::user()->user_type == 2) {
                return view('recruiter.postedjob', compact('job'));
            }
        }
        else {
            return view('jobseeker.appliedjob', compact('job'));
        }
    }

    public function jobSeekersApplied($id, $title)
    {   
        $appliedCands = JobJobSeeker::join('jobs', 'jobs.id', '=', 'job_job_seekers.job_id')
                    ->join('users', 'users.id', '=', 'job_job_seekers.user_id')
                    ->join('job_seekers', 'job_seekers.user_id', '=', 'users.id')
                    ->where('jobs.id', $id)
                    ->select('users.id', 'users.first_name', 'users.last_name', 'users.email', 'job_seekers.*')
                    ->get();
        return view('appliedJobSeekerProfiles', compact('appliedCands'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $title)
    {
        $job = Job::find($id);
        if (count($job)>0) {
            $job->status = 0;
            $job->save();
            session()->flash('message', 'Job posted successfully');
            return redirect()->route('recruiter.jobpostslist');
        }
        return redirect()->route('recruiter.jobpostslist');
    }
}
