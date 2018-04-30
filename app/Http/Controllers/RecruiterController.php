<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\User;
use App\Recruiter;
use App\Models\JobJobSeeker;
use App\Http\Requests\RecruiterCreateRequest;
use App\Http\Requests\RecruiterSigninRequest;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('jobs.user_id', Auth::user()->id)->where('status', '1')->get();
        return view('recruiter.joblist', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recruiter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RecruiterCreateRequest $request)
    {
        //
    }

    public function getProfile() 
    {
        $user = User::join('recruiters', 'recruiters.user_id', '=', 'users.id')
                        ->where('recruiters.user_id', Auth::user()->id)
                        ->where('users.id', Auth::user()->id)
                        ->select('users.first_name', 'users.last_name', 'users.email', 'recruiters.*')
                        ->first();
        return view('recruiter.profile', compact('user'));
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('user.signin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('recruiter.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecruiterCreateRequest $request, $id)
    {
        $recruiter = Recruiter::where('recruiters.user_id', $id)->first();
        if (count($recruiter)>0) {
            $recruiter->user_id = Auth::user()->id;
            $recruiter->age = $request->age;
            $recruiter->phone = $request->phone;
            $recruiter->designation = $request->designation;
            $recruiter->company_name = $request->company_name;
            if ($recruiter->save()) {
                session()->flash('message', 'Profile updated successfully');
                return redirect()->route('recruiter.edit');
            }
        }
        else{
            $recruiter = new Recruiter();
            $recruiter->user_id = Auth::user()->id;
            $recruiter->age = $request->age;
            $recruiter->phone = $request->phone;
            $recruiter->designation = $request->designation;
            $recruiter->company_name = $request->company_name;
            if ($recruiter->save()) {
                session()->flash('message', 'Profile updated successfully');
                return redirect()->route('recruiter.edit');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
