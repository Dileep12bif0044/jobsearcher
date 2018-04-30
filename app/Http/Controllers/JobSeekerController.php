<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Http\Requests\JobSeekerCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\JobJobSeeker;
use App\Models\Job;

class JobSeekerController extends Controller
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

    public function jobApply(Request $request)
    {
        if (Auth::check()) {
            $jobApply = new JobJobSeeker();
            $jobApply->job_id = $request->job_id;
            $jobApply->user_id = Auth::user()->id;
            if($jobApply->save()) {
                session()->flash('message', 'You have applied succesfully');
                return redirect()->route('home');
            }
        }
        else {
            session()->flash('message', 'You are not logged in');
            return redirect()->route('user.signin');
        }
    }

    public function getAppliedJobs()
    { 
        $jobs = Job::join('job_job_seekers', 'job_job_seekers.job_id', '=', 'jobs.id')
                    ->join('users', 'users.id', '=', 'job_job_seekers.user_id')
                    ->where('users.id', Auth::user()->id)
                    ->select('jobs.*')
                    ->latest()
                    ->get();
        return view('jobseeker.appliedjobs', compact('jobs'));
    }
    public function getProfile() 
    {   
        $user = User::join('job_seekers', 'job_seekers.user_id', '=', 'users.id')
                        ->where('job_seekers.user_id', Auth::user()->id)
                        ->where('users.id', Auth::user()->id)
                        ->select('users.first_name', 'users.last_name', 'users.email', 'job_seekers.*')
                        ->first();
        return view('jobseeker.profile', compact('user'));
    }

    public function getLogout() 
    {
        Auth::logout();
        return redirect()->route('user.signin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function show(JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function edit(JobSeeker $jobSeeker)
    {
        return view('jobseeker.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobSeekerCreateRequest $request, $id)
    {
        $jobSeeker = JobSeeker::where('job_seekers.user_id', $id)->first();
        if ($jobSeeker) {
            $jobSeeker->user_id = Auth::user()->id;
            $jobSeeker->age = $request->age;
            $jobSeeker->phone = $request->phone;
            $jobSeeker->skills = $request->skills;
            $jobSeeker->designation = $request->designation;
            $jobSeeker->experience = $request->experience;
            $jobSeeker->expected_salary = $request->expected_salary;
            $jobSeeker->currunt_location = $request->currunt_location;
            if ($jobSeeker->save()) {
                session()->flash('message', 'Profile updated successfully');
                return redirect()->route('jobseeker.edit');
            }
        }
        else {
            $jobSeeker = new JobSeeker();
            $jobSeeker->user_id = Auth::user()->id;
            $jobSeeker->age = $request->age;
            $jobSeeker->phone = $request->phone;
            $jobSeeker->skills = $request->skills;
            $jobSeeker->designation = $request->designation;
            $jobSeeker->experience = $request->experience;
            $jobSeeker->expected_salary = $request->expected_salary;
            $jobSeeker->currunt_location = $request->currunt_location;
            if ($jobSeeker->save()) {
                session()->flash('message', 'Profile updated successfully');
                return redirect()->route('jobseeker.edit');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobSeeker $jobSeeker)
    {
        //
    }
}
