<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recruiter;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserSigninRequest;

class UserController extends Controller
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
    public function jobSeekerCreate()
    {
        return view('jobseeker.create');
    }

    public function recruiterCreate()
    {
        return view('recruiter.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserCreateRequest $request)
    {   
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            session()->flash('message', 'Youor account has been registered successfully !!');
            return redirect()->route('home');
        }
        redirect()->back();
    }

    public function getSignin()
    {
        return view('signin');
    }

    public function postSignin(Request $request, UserSigninRequest $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (Auth::user()->user_type == 1) {
                return redirect()->route('jobseeker.profile');
            }
            elseif (Auth::user()->user_type == 2) {
                return redirect()->route('recruiter.profile');
            }
        }
        return redirect()->back();
    }

    public function loggedInUser($id)
    {   
        $user = User::find($id);
        if (Auth::check()) {
            if ($user->user_type == 1) {
            $user = User::join('job_seekers', 'job_seekers.user_id', '=', 'users.id')
                        ->where('users.id', $id)
                        ->first();
                return view('jobSeekerDeatails', compact('user'));
            }
            else {
                $user = User::join('recruiters', 'recruiters.user_id', '=', 'users.id')
                            ->where('users.id', $id)
                            ->first();
                return view('recruiterDetailes', compact('user'));
            }
        }
        else {
            session()->flash('message', 'You are not logged in');
            return redirect()->route('user.signin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
