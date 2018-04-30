@extends('layouts.master')
@section('title')
    SignUp
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
            <h1>Recruiter Sign Up</h1>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('user.store') }}" method="post">
                <div class="form-group">
                    <label for="name">Fist Name <span class="alert-danger">*</span></label>
                    <input type="text" id="fist-name" name="first_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Last Name <span class="alert-danger">*</span></label>
                    <input type="text" id="last-name" name="last_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-Mail <span class="alert-danger">*</span></label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <input type="hidden" id="recruiter" name="user_type" value="2" class="form-control">
                <div class="form-group">
                    <label for="password">Password <span class="alert-danger">*</span></label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Confirm-Password <span class="alert-danger">*</span></label>
                    <input type="password" id="confirm-password" name="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection